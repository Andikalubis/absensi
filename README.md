# Judul: Dokumentasi Frontend Sistem Absensi Karyawan
# Teknologi: PHP (Laravel 12.32.5), Blade Template, Bootstrap
# Tujuan: Menyediakan interface untuk menampilkan data karyawan, departemen, dan absensi.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


1. Struktur Project

/app/Http/Controllers/AttendanceHistory.php → Controller untuk Absensi

/resources/views/attendance-history/index.blade.php → Halaman daftar karyawan

/resources/views/attendance-history/show.blade.php → Modal/Detail log absensi per karyawan

2. Fitur Frontend

    Daftar Karyawan

    Menampilkan employee_id, nama, departemen, dan action “View History”.

    Filter berdasarkan departemen.

    Detail Absensi

    Menampilkan modal atau halaman baru berisi daftar absensi: waktu masuk, waktu pulang, deskripsi.

    Warna/label bisa dibedakan berdasarkan attendance_type (1 = Masuk, 2 = Pulang).

    Routing

    // Redirect root ke Departement
    Route::get('/', function () {
        return redirect()->route('departement.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Departement Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('departement')->name('departement.')->group(function () {
        Route::get('/', [Department::class, 'index'])->name('index');
        Route::get('/create', [Department::class, 'create'])->name('create');
        Route::post('/store', [Department::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Department::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [Department::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [Department::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Employee Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('employees')->name('employee.')->group(function () {
        Route::get('/', [Employee::class, 'index'])->name('index');
        Route::get('/create', [Employee::class, 'create'])->name('create');
        Route::post('/store', [Employee::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Employee::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [Employee::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [Employee::class, 'destroy'])->name('destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Attendance Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('/', [Attendance::class, 'index'])->name('index');
        Route::post('/checkin', [Attendance::class, 'checkin'])->name('checkin');
        Route::put('/checkout', [Attendance::class, 'checkout'])->name('checkout');
    });

    /*
    |--------------------------------------------------------------------------
    | Attendance History / Log Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('attendance-history')->name('attendance-history.')->group(function () {
        Route::get('/', [AttendanceHistory::class, 'index'])->name('index');
        Route::get('/{employeeId}', [AttendanceHistory::class, 'show'])->name('show');
    });

3. Contoh Blade Template
    index.blade
    
    @foreach($employees as $emp)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $emp['employee_id'] ?? '-' }}</td>
        <td>{{ $emp['name'] ?? '-' }}</td>
        <td>{{ $emp['departement_name'] ?? '-' }}</td>
        <td>
            <a href="{{ route('attendance-history.show', $emp['employee_id']) }}" class="btn btn-sm btn-info">
                View History
            </a>
        </td>
    </tr>
    @endforeach

    show.blade

    @foreach($logs as $log)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ \Carbon\Carbon::parse($log['date_attendance'])->format('Y-m-d H:i') }}</td>
        <td>{{ $log['attendance_type'] == 1 ? 'Masuk' : 'Pulang' }}</td>
        <td>{{ $log['description'] ?? '-' }}</td>
    </tr>
    @endforeach


