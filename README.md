# Konsuli Academy - Backlog

Epics:
1. Manajemen Pengguna
2. Manajemen Program Studi
3. Manajemen Mata Kuliah
4. Manajemen Enrollment
5. Manajemen Nilai
6. Transkrip Akademik
7. Manajemen Pembayaran
8. Integrasi dengan Moodle

User Stories:

Epic 1: Manajemen Pengguna
- Sebagai Admin, saya ingin dapat membuat akun pengguna baru agar pengguna dapat mengakses sistem.
- Sebagai Admin, saya ingin dapat memperbarui data akun pengguna agar informasi pengguna selalu up-to-date.
- Sebagai Admin, saya ingin dapat menghapus akun pengguna yang sudah tidak aktif untuk menjaga keamanan sistem.

Epic 2: Manajemen Program Studi
- Sebagai Admin, saya ingin dapat membuat program studi baru agar dapat mengelola mata kuliah terkait.
- Sebagai Admin, saya ingin dapat memperbarui data program studi agar informasi selalu akurat.
- Sebagai Admin, saya ingin dapat menghapus program studi yang sudah tidak aktif untuk menjaga konsistensi data.

Epic 3: Manajemen Mata Kuliah
- Sebagai Admin, saya ingin dapat membuat mata kuliah baru agar dapat diambil oleh mahasiswa.
- Sebagai Admin, saya ingin dapat memperbarui data mata kuliah agar informasi selalu akurat.
- Sebagai Admin, saya ingin dapat menghapus mata kuliah yang sudah tidak ditawarkan untuk menjaga konsistensi data.

Epic 4: Manajemen Enrollment
- Sebagai Admin, saya ingin dapat mendaftarkan mahasiswa ke mata kuliah agar mahasiswa dapat mengikuti perkuliahan.
- Sebagai Admin, saya ingin dapat mengeluarkan mahasiswa dari mata kuliah jika diperlukan.

Epic 5: Manajemen Nilai
- Sebagai Dosen, saya ingin dapat memasukkan nilai mahasiswa agar tersimpan dalam sistem.
- Sebagai Dosen, saya ingin dapat memperbarui nilai mahasiswa jika ada perubahan.
- Sebagai Dosen, saya ingin dapat mengambil nilai dari Moodle agar sinkron dengan SIA.

Epic 6: Transkrip Akademik
- Sebagai Dosen, saya ingin dapat menghasilkan transkrip akademik mahasiswa untuk keperluan administrasi.
- Sebagai Mahasiswa, saya ingin dapat melihat transkrip akademik saya untuk memantau progres studi.

Epic 7: Manajemen Pembayaran
- Sebagai Admin, saya ingin dapat membuat data pembayaran mahasiswa untuk mencatat status pembayaran.
- Sebagai Admin, saya ingin dapat memperbarui data pembayaran mahasiswa jika ada perubahan.
- Sebagai Mahasiswa, saya ingin dapat melihat status pembayaran saya untuk memastikan pembayaran telah diterima.

Epic 8: Integrasi dengan Moodle
- Sebagai Mahasiswa, saya ingin dapat melihat jadwal kuliah yang diambil dari Moodle agar sesuai dengan data di SIA.
- Sebagai Mahasiswa, saya ingin dapat melihat nilai yang diambil dari Moodle agar sinkron dengan data di SIA.
- Sebagai Mahasiswa, saya ingin dapat mengakses materi kuliah dari Moodle melalui SIA untuk kemudahan akses.
- Sebagai Dosen, saya ingin dapat mengelola aktivitas pembelajaran di Moodle melalui SIA untuk efisiensi.


# Entity Relationship Diagram
```
erDiagram
    USER ||--o{ ENROLLMENT : performs
    USER ||--|| ROLE : has
    USER ||--o{ PAYMENT : makes
    
    USER {
        int user_id PK
        string username
        string email
        string password
        string first_name
        string last_name
    }
    
    ROLE {
        int role_id PK
        string role_name
    }
    
    ADMIN }|--|| ROLE : is_a
    TEACHER }|--|| ROLE : is_a
    STUDENT }|--|| ROLE : is_a
    
    ENROLLMENT {
        int enrollment_id PK
        int user_id FK
        string course_id
        string semester
        int credits
        float grade
    }
    
    TRANSCRIPT {
        int transcript_id PK
        int user_id FK
        float gpa
        string status
    }
    
    TRANSCRIPT_DETAIL {
        int transcript_detail_id PK
        int transcript_id FK
        string course_id
        string semester
        int credits
        float grade
    }
    
    PAYMENT {
        int payment_id PK
        int user_id FK
        float amount
        string payment_method
        timestamp payment_date
        string status
    }
    
    USER ||--o{ TRANSCRIPT : has
    TRANSCRIPT ||--|{ TRANSCRIPT_DETAIL : contains
```
# Use Case Diagram
```
usecase Academic Information System {
    left to right direction

    actor Admin
    actor Teacher
    actor Student

    rectangle System {
        usecase "Manage Users" as UC1
        usecase "Create User Account" as UC1.1
        usecase "Update User Account" as UC1.2
        usecase "Delete User Account" as UC1.3

        usecase "Manage Study Programs" as UC2
        usecase "Create Study Program" as UC2.1
        usecase "Update Study Program" as UC2.2
        usecase "Delete Study Program" as UC2.3

        usecase "Manage Courses" as UC3
        usecase "Create Course" as UC3.1
        usecase "Update Course" as UC3.2
        usecase "Delete Course" as UC3.3

        usecase "Manage Enrollments" as UC4
        usecase "Enroll Student" as UC4.1
        usecase "Drop Student" as UC4.2

        usecase "Manage Grades" as UC5
        usecase "Enter Grades" as UC5.1
        usecase "Update Grades" as UC5.2
        usecase "Fetch Grades from Moodle" as UC5.3

        usecase "Generate Transcript" as UC6

        usecase "Manage Payments" as UC7
        usecase "Create Payment" as UC7.1
        usecase "Update Payment" as UC7.2

        usecase "View Course Schedule" as UC8

        usecase "View Grades" as UC9

        usecase "Make Payment" as UC10
    }

    Admin --> UC1
    Admin --> UC1.1
    Admin --> UC1.2
    Admin --> UC1.3

    Admin --> UC2
    Admin --> UC2.1
    Admin --> UC2.2
    Admin --> UC2.3

    Admin --> UC3
    Admin --> UC3.1
    Admin --> UC3.2
    Admin --> UC3.3

    Admin --> UC4
    Admin --> UC4.1
    Admin --> UC4.2

    Teacher --> UC5
    Teacher --> UC5.1
    Teacher --> UC5.2
    Teacher --> UC5.3

    Teacher --> UC6

    Admin --> UC7
    Admin --> UC7.1
    Admin --> UC7.2

    Student --> UC8

    Student --> UC9

    Student --> UC10
}


