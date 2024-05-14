# Moodle Clone - Backlog

## 1. Implementasi Manajemen Pengguna (User)
   - Membuat fitur registrasi, login, dan manajemen profil pengguna
   - Mengimplementasikan peran (Role) dan pemberian peran (RoleAssignment)
   - Menyimpan preferensi pengguna (UserPreference)

## 2. Pengembangan Fitur Kursus (Course) 
   - Membuat manajemen kategori kursus (CourseCategory)
   - Mengimplementasikan pembuatan, pengeditan, dan penghapusan kursus
   - Menambahkan fitur pengaturan kursus (format, tanggal mulai/selesai, dll.)

## 3. Implementasi Struktur Kursus
   - Membuat fitur pembuatan dan manajemen bagian (Section) dalam kursus
   - Mengimplementasikan modul aktivitas (ActivityModule) yang dapat ditambahkan ke dalam bagian

## 4. Pengembangan Modul Aktivitas
   - Mengimplementasikan modul Lesson beserta halaman pelajaran (LessonPage)
   - Membuat modul Forum dengan fitur diskusi (Discussion) dan posting (Post)
   - Mengimplementasikan modul Quiz dengan manajemen pertanyaan (Question) dan jawaban (Answer)
   - Membuat modul Assignment dengan fitur pengumpulan tugas (Submission) dan pemberian umpan balik (Feedback)

## 5. Implementasi Buku Nilai (Gradebook)
   - Membuat fitur kategori buku nilai (GradebookCategory) dan item buku nilai (GradebookItem)
   - Mengimplementasikan pemberian nilai (GradeItem) untuk setiap pengguna
   - Menambahkan metode penilaian (GradingMethod) untuk tugas

## 6. Pengembangan Fitur Pelacakan Penyelesaian (Completion Tracking)
   - Membuat kriteria penyelesaian (CompletionCriteria) untuk kursus
   - Mengimplementasikan pelacakan penyelesaian kursus (CourseCompletion) untuk setiap pengguna
   - Menambahkan pelacakan penyelesaian aktivitas (ActivityCompletion) untuk setiap pengguna

## 7. Implementasi Fitur Grup (Group)
   - Membuat manajemen grup dalam kursus
   - Mengimplementasikan keanggotaan grup (GroupMembership) untuk pengguna

## 8. Pengembangan Sistem Berkas (File)
   - Mengimplementasikan penyimpanan dan manajemen berkas yang diunggah dalam kursus
   - Menghubungkan berkas dengan entitas terkait seperti Submission dan Feedback

## 9. Implementasi Fitur Kalender dan Acara (Event)
   - Membuat manajemen acara dalam kursus
   - Menampilkan kalender dengan acara yang terkait dengan kursus

## 10. Pengembangan Sistem Pencatatan (Logging)
    - Mengimplementasikan pencatatan aktivitas pengguna (Log)
    - Membuat pencatatan kejadian sistem (EventLog)

## 11. Pengujian dan Perbaikan Bug 
    - Melakukan pengujian menyeluruh pada semua fitur dan modul
    - Memperbaiki bug dan melakukan penyempurnaan berdasarkan umpan balik pengguna

## 12. Dokumentasi dan Panduan Pengguna
    - Membuat dokumentasi teknis untuk pengembang
    - Menyusun panduan pengguna untuk admin dan instruktur

Catatan: Backlog ini disusun berdasarkan ERD yang diberikan. Beberapa fitur dan entitas mungkin perlu 
ditambahkan atau dimodifikasi sesuai dengan kebutuhan dan kompleksitas proyek klon Moodle yang sebenarnya.

```
erDiagram
User {
    id int PK
    name string
    email string
    password string
    timezone string
    language string
    last_login timestamp
}
Role {
    id int PK
    name string
    description text
    archetype string
}

RoleAssignment {
    id int PK
    user_id int FK
    role_id int FK
    context_type string
    context_id int
}

CourseCategory {
    id int PK
    name string
    description text
    parent_id int FK
    path string
    depth int
}

Course {
    id int PK
    category_id int FK
    full_name string
    short_name string
    summary text
    start_date int
    end_date int
    visible boolean
    format string
    theme string
    settings json
}

Section {
    id int PK
    course_id int FK
    name string
    summary text
    sequence text
    visible boolean
}

ActivityModule {
    id int PK
    course_id int FK
    module_name string
    instance_id int
    section_id int FK
    name string
    intro text
    visible boolean
    completion int
}

Activity {
    id int PK
    activity_module_id int FK
    name string
    intro text
    completion_tracking string
}

ActivityPage {
    id int PK
    activity_id int FK
    title string
    content text
    type string
    order int
}

Forum {
    id int PK
    course_id int FK
    type string
    name string
    intro text
    assessed int
    scale int
}

Discussion {
    id int PK
    forum_id int FK
    name string
    first_post_id int FK
    user_id int FK
    group_id int FK
    assessed int
}

Post {
    id int PK
    discussion_id int FK
    parent_id int FK
    user_id int FK
    message text
    rating int
}

QuestionCategory {
    id int PK
    course_id int FK
    name string
    info text
    parent_id int FK
}

Question {
    id int PK
    category_id int FK
    type string
    name string
    questiontext text
    generalfeedback text
    defaultmark float
}

Answer {
    id int PK
    question_id int FK
    answer text
    fraction float
    feedback text
}

Quiz {
    id int PK
    activity_module_id int FK
    name string
    intro text
    time_open int
    time_close int
    time_limit int
    attempts_number int
    grade_method string
    question_behavior string
    review_options json
}

Assignment {
    id int PK
    activity_module_id int FK
    name string
    intro text
    allow_submissions_from_date int
    due_date int
    cut_off_date int
    max_attempts int
    submission_types json
    group_mode string
    blind_marking boolean
    plagiarism_plugin string
}

Submission {
    id int PK
    assignment_id int FK
    user_id int FK
    status string
    content text
    files json
    time_created int
    time_modified int
    grade float
}

Feedback {
    id int PK
    submission_id int FK
    grade float
    content text
    files json
}

Grade {
    id int PK
    user_id int FK
    item_id int FK
    grade float
    time_created int
    time_modified int
}

GradeHistory {
    id int PK
    grade_id int FK
    old_grade float
    new_grade float
    time_created int
}

Scale {
    id int PK
    course_id int FK
    name string
    scale text
    description text
}

Outcome {
    id int PK
    course_id int FK
    short_name string
    full_name string
    description text
}

GradebookCategory {
    id int PK
    course_id int FK
    name string
    description text
    parent_id int FK
    aggregation string
}

GradebookItem {
    id int PK
    gradebook_category_id int FK
    item_type string
    item_module string
    item_instance int
    item_number int
    calculation string
    grade_type int
    grade_max float
    grade_min float
    scale_id int FK
    outcome_id int FK
}

Enrol {
    id int PK
    course_id int FK
    user_id int FK
    role_id int FK
    time_start int
    time_end int
    status int
}

Cohort {
    id int PK
    context_id int
    name string
    description text
}

CohortMember {
    id int PK
    cohort_id int FK
    user_id int FK
}

Notification {
    id int PK
    user_id int FK
    course_id int FK
    message text
    type string
    status int
    time_created int
}

Message {
    id int PK
    user_from_id int FK
    user_to_id int FK
    message text
    format int
    time_created int
}

Backup {
    id int PK
    course_id int FK
    user_id int FK
    type int
    execution_time int
    file_path string
}

File {
    id int PK
    context_id int
    component string
    file_area string
    item_id int
    file_path string
    file_name string
    file_size int
    mime_type string
    time_created int
}

Tag {
    id int PK
    name string
    description text
}

TagInstance {
    id int PK
    tag_id int FK
    component string
    item_type string
    item_id int
    context_id int
}

CompletionCriteria {
    id int PK
    course_id int FK
    criteria_type string
    criteria_value string
}

CourseCompletion {
    id int PK
    user_id int FK
    course_id int FK
    time_enrolled int
    time_started int
    time_completed int
    status string
}

ActivityCompletion {
    id int PK
    user_id int FK
    activity_module_id int FK
    status string
    time_completed int
}

Group {
    id int PK
    course_id int FK
    name string
    description text
}

GroupMembership {
    id int PK
    user_id int FK
    group_id int FK
}

Event {
    id int PK
    name string
    description text
    format int
    course_id int FK
    group_id int FK
    user_id int FK
    instance_id int
    event_type string
    time_start int
    time_end int
    visible int
}

UserPreference {
    id int PK
    user_id int FK
    name string
    value string
}

Log {
    id int PK
    time int
    user_id int FK
    ip_address string
    course_id int FK
    module string
    cmid int
    action string
    url string
    info string
}

EventLog {
    id int PK
    event_name string
    component string
    action string
    target string
    object_table string
    object_id int
    crud string
    user_id int FK
    time_created int
    ip_address string
    other_data text
}

User ||--o{ RoleAssignment : has
User ||--o{ Discussion : creates
User ||--o{ Post : creates
User ||--o{ Submission : submits
User ||--o{ Grade : receives
User ||--o{ Enrol : has
User ||--o{ CohortMember : is
User ||--o{ Notification : receives
User ||--o{ Message : sends
User ||--o{ Backup : creates
User ||--o{ CourseCompletion : has
User ||--o{ ActivityCompletion : has
User ||--o{ GroupMembership : has
User ||--o{ Event : creates
User ||--o{ UserPreference : has
User ||--o{ Log : generates
User ||--o{ EventLog : generates

Role ||--o{ RoleAssignment : is_assigned

CourseCategory ||--o{ Course : contains
CourseCategory ||--o{ CourseCategory : has_parent

Course ||--o{ Section : has
Course ||--o{ ActivityModule : has
Course ||--o{ Forum : has
Course ||--o{ QuestionCategory : has
Course ||--o{ Scale : has
Course ||--o{ Outcome : has
Course ||--o{ GradebookCategory : has
Course ||--o{ Enrol : has
Course ||--o{ Notification : has
Course ||--o{ Backup : has
Course ||--o{ CompletionCriteria : has
Course ||--o{ CourseCompletion : has
Course ||--o{ Group : has
Course ||--o{ Event : has

Section ||--o{ ActivityModule : contains

ActivityModule ||--o{ Activity : is
ActivityModule ||--o{ Quiz : is
ActivityModule ||--o{ Assignment : is
ActivityModule ||--o{ ActivityCompletion : has

Activity ||--o{ ActivityPage : has

Forum ||--o{ Discussion : contains

Discussion ||--o{ Post : contains
Discussion ||--|{ Group : belongs_to

QuestionCategory ||--o{ Question : contains
QuestionCategory ||--o{ QuestionCategory : has_parent

Question ||--o{ Answer : has
Question ||--|{ Quiz : belongs_to

Assignment ||--o{ Submission : receives

Submission ||--o{ Feedback : receives
Submission ||--o{ File : has

Grade ||--|{ GradebookItem : belongs_to
Grade ||--o{ GradeHistory : has

Scale ||--|{ Course : belongs_to
Scale ||--|{ GradebookItem : used_by

Outcome ||--|{ Course : belongs_to
Outcome ||--|{ GradebookItem : used_by

GradebookCategory ||--o{ GradebookItem : contains
GradebookCategory ||--o{ GradebookCategory : has_parent

GradebookItem ||--o{ Grade : has

Enrol ||--|{ User : belongs_to
Enrol ||--|{ Course : belongs_to
Enrol ||--|{ Role : has

Cohort ||--o{ CohortMember : has

CohortMember ||--|{ User : belongs_to

Notification ||--|{ User : belongs_to
Notification ||--|{ Course : belongs_to

Message ||--|{ User : belongs_to

Backup ||--|{ Course : belongs_to
Backup ||--|{ User : belongs_to

File ||--|{ Submission : belongs_to
File ||--|{ Feedback : belongs_to

Tag ||--o{ TagInstance : has

TagInstance ||--|{ Tag : belongs_to

CompletionCriteria ||--|{ Course : belongs_to

CourseCompletion ||--|{ User : belongs_to
CourseCompletion ||--|{ Course : belongs_to

ActivityCompletion ||--|{ User : belongs_to
ActivityCompletion ||--|{ ActivityModule : belongs_to

Group ||--|{ Course : belongs_to

GroupMembership ||--|{ User : belongs_to
GroupMembership ||--|{ Group : belongs_to

Event ||--|{ Course : belongs_to
Event ||--|{ Group : belongs_to
Event ||--|{ User : belongs_to

Log ||--|{ User : belongs_to
Log ||--|{ Course : belongs_to

EventLog ||--|{ User : belongs_to
