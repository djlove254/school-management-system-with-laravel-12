<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\AcademicYear;
use App\Models\Attendance;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Notice;
use App\Models\Event;
use App\Models\News;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        $year = AcademicYear::where('is_current', true)->first();

        if (!$year) {
            $this->command?->error('No current academic year found. Create an academic year first.');
            return;
        }

        // ==================== CLASSES ====================
        $classNames = [
            'Class 1',
            'Class 2',
            'Class 3',
            'Class 4',
            'Class 5',
            'Class 6',
            'Class 7',
            'Class 8',
            'Class 9',
            'Class 10',
        ];

        $classes = [];

        foreach ($classNames as $i => $name) {
            $classes[] = SchoolClass::firstOrCreate(
                [
                    'name' => $name,
                    'academic_year_id' => $year->id,
                ],
                [
                    'numeric_name' => $i + 1,
                ]
            );
        }

        // ==================== SECTIONS ====================
        $sections = [];

        foreach ($classes as $class) {
            foreach (['A', 'B'] as $sec) {
                $sections[] = Section::firstOrCreate(
                    [
                        'class_id' => $class->id,
                        'name' => $sec,
                    ],
                    [
                        'capacity' => 40,
                    ]
                );
            }
        }

        // ==================== SUBJECTS ====================
        $subjectData = [
            [
                'name' => 'Mathematics',
                'code' => 'MATH',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'English',
                'code' => 'ENG',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Kiswahili',
                'code' => 'KIS',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Integrated Science',
                'code' => 'SCI',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Social Studies',
                'code' => 'SST',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Christian Religious Education',
                'code' => 'CRE',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Computer Studies',
                'code' => 'CS',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Agriculture',
                'code' => 'AGR',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Creative Arts',
                'code' => 'ART',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
            [
                'name' => 'Business Studies',
                'code' => 'BST',
                'full_marks' => 100,
                'pass_marks' => 33,
            ],
        ];

        foreach ($subjectData as $sub) {
            Subject::firstOrCreate(
                ['code' => $sub['code']],
                $sub
            );
        }

        // ==================== TEACHERS ====================
        $teacherData = [
            [
                'name' => 'David Kiptoo',
                'email' => 'david.teacher@school.ac.ke',
                'gender' => 'male',
                'qual' => 'B.Ed Mathematics',
                'spec' => 'Mathematics',
                'salary' => 45000,
            ],
            [
                'name' => 'Mercy Chebet',
                'email' => 'mercy.teacher@school.ac.ke',
                'gender' => 'female',
                'qual' => 'B.Ed English',
                'spec' => 'English',
                'salary' => 42000,
            ],
            [
                'name' => 'Brian Ochieng',
                'email' => 'brian.teacher@school.ac.ke',
                'gender' => 'male',
                'qual' => 'B.Ed Science',
                'spec' => 'Integrated Science',
                'salary' => 46000,
            ],
            [
                'name' => 'Faith Wanjiru',
                'email' => 'faith.teacher@school.ac.ke',
                'gender' => 'female',
                'qual' => 'B.Ed Kiswahili',
                'spec' => 'Kiswahili',
                'salary' => 43000,
            ],
            [
                'name' => 'Samuel Kiplangat',
                'email' => 'samuel.teacher@school.ac.ke',
                'gender' => 'male',
                'qual' => 'B.Ed Computer Studies',
                'spec' => 'Computer Studies',
                'salary' => 48000,
            ],
            [
                'name' => 'Esther Akinyi',
                'email' => 'esther.teacher@school.ac.ke',
                'gender' => 'female',
                'qual' => 'B.Ed Social Studies',
                'spec' => 'Social Studies',
                'salary' => 41000,
            ],
            [
                'name' => 'Joseph Kibet',
                'email' => 'joseph.teacher@school.ac.ke',
                'gender' => 'male',
                'qual' => 'B.Ed Agriculture',
                'spec' => 'Agriculture',
                'salary' => 44000,
            ],
            [
                'name' => 'Lydia Wambui',
                'email' => 'lydia.teacher@school.ac.ke',
                'gender' => 'female',
                'qual' => 'B.Ed Creative Arts',
                'spec' => 'Creative Arts',
                'salary' => 40000,
            ],
        ];

        foreach ($teacherData as $i => $td) {
            $user = User::firstOrCreate(
                ['email' => $td['email']],
                [
                    'name' => $td['name'],
                    'password' => Hash::make('password123'),
                    'gender' => $td['gender'],
                    'phone' => '+2547' . rand(10000000, 99999999),
                    'status' => 'active',
                ]
            );

            if (!$user->hasRole('teacher')) {
                $user->assignRole('teacher');
            }

            Teacher::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'employee_id' => 'EMP-2026-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                    'joining_date' => '2024-01-08',
                    'qualification' => $td['qual'],
                    'specialization' => $td['spec'],
                    'salary' => $td['salary'],
                    'status' => 'active',
                ]
            );
        }

        // ==================== STUDENTS ====================
        $maleNames = [
            'Brian Kiptoo',
            'Kevin Otieno',
            'Dennis Mwangi',
            'Ian Kamau',
            'Elijah Kiprotich',
            'Ryan Ochieng',
            'Collins Mutua',
            'Victor Omondi',
            'Samuel Kariuki',
            'Daniel Kiplagat',
            'Martin Onyango',
            'Felix Maina',
            'Eric Bett',
            'Ian Njoroge',
            'Mark Kipkorir',
            'Allan Wekesa',
            'Joel Mutiso',
            'Victor Kibet',
            'Robert Kamau',
            'John Mwangi',
        ];

        $femaleNames = [
            'Sharon Jepchirchir',
            'Mercy Wanjiku',
            'Faith Akinyi',
            'Brenda Chebet',
            'Diana Wambui',
            'Ann Njeri',
            'Lydia Chepkirui',
            'Cynthia Atieno',
            'Grace Muthoni',
            'Joyce Nyambura',
            'Purity Chepkoech',
            'Esther Naliaka',
            'Sheila Wairimu',
            'Carol Auma',
            'Irene Jepkosgei',
            'Beatrice Wanjiru',
            'Mary Chebet',
            'Ruth Adhiambo',
            'Stacy Njoki',
            'Janet Nyokabi',
        ];

        $studentCount = 0;

        foreach (array_slice($classes, 0, 5) as $class) {
            $classSections = Section::where('class_id', $class->id)->get();

            foreach ($classSections as $section) {
                $count = rand(15, 20);

                for ($i = 0; $i < $count; $i++) {
                    $isMale = rand(0, 1);

                    $names = $isMale
                        ? $maleNames
                        : $femaleNames;

                    $name = $names[array_rand($names)];

                    $email = strtolower(
                        str_replace(' ', '.', $name)
                    ) . rand(100, 999) . '@student.school.ac.ke';

                    if (User::where('email', $email)->exists()) {
                        continue;
                    }

                    $user = User::create([
                        'name' => $name,
                        'email' => $email,
                        'password' => Hash::make('password123'),
                        'gender' => $isMale ? 'male' : 'female',
                        'date_of_birth' => Carbon::now()
                            ->subYears(rand(8, 16))
                            ->toDateString(),
                        'phone' => '+2547' . rand(10000000, 99999999),
                        'status' => 'active',
                    ]);

                    $user->assignRole('student');

                    $studentCount++;

                    $admNo = 'ADM-2026-' .
                        str_pad($studentCount, 4, '0', STR_PAD_LEFT);

                    $rollNo = $class->id .
                        $section->id .
                        str_pad($studentCount, 3, '0', STR_PAD_LEFT);

                    Student::create([
                        'user_id' => $user->id,
                        'roll_number' => $rollNo,
                        'admission_number' => $admNo,
                        'admission_date' => '2026-01-12',
                        'class_id' => $class->id,
                        'section_id' => $section->id,
                        'academic_year_id' => $year->id,
                        'status' => 'active',
                    ]);
                }
            }
        }

        // ==================== ATTENDANCE ====================
        $students = Student::all();

        for ($day = 30; $day >= 1; $day--) {
            $date = Carbon::now()
                ->subDays($day)
                ->toDateString();

            $dayOfWeek = Carbon::parse($date)->dayOfWeek;

            if ($dayOfWeek == 0 || $dayOfWeek == 6) {
                continue;
            }

            foreach ($students->take(50) as $student) {
                $rand = rand(1, 10);

                $status = $rand <= 8
                    ? 'present'
                    : ($rand == 9 ? 'absent' : 'late');

                Attendance::firstOrCreate(
                    [
                        'student_id' => $student->id,
                        'date' => $date,
                    ],
                    [
                        'class_id' => $student->class_id,
                        'section_id' => $student->section_id,
                        'status' => $status,
                        'marked_by' => 1,
                    ]
                );
            }
        }

        // ==================== EXAMS ====================
        $exams = [
            [
                'name' => 'First Term Assessment',
                'start_date' => '2026-04-13',
                'end_date' => '2026-04-17',
                'status' => 'completed',
            ],
            [
                'name' => 'Mid Year Assessment',
                'start_date' => '2026-06-15',
                'end_date' => '2026-06-19',
                'status' => 'completed',
            ],
            [
                'name' => 'Term Three Assessment',
                'start_date' => '2026-09-28',
                'end_date' => '2026-10-02',
                'status' => 'upcoming',
            ],
            [
                'name' => 'End of Year Assessment',
                'start_date' => '2026-11-23',
                'end_date' => '2026-11-27',
                'status' => 'upcoming',
            ],
        ];

        foreach ($exams as $exam) {
            Exam::firstOrCreate(
                ['name' => $exam['name']],
                array_merge(
                    $exam,
                    ['academic_year_id' => $year->id]
                )
            );
        }

        // ==================== MARKS ====================
        $exam = Exam::where('status', 'completed')->first();

        if ($exam) {
            $subjects = Subject::take(5)->get();

            foreach ($students->take(30) as $student) {
                foreach ($subjects as $subject) {
                    Mark::firstOrCreate(
                        [
                            'student_id' => $student->id,
                            'exam_id' => $exam->id,
                            'subject_id' => $subject->id,
                        ],
                        [
                            'marks_obtained' => rand(40, 98),
                            'full_marks' => $subject->full_marks,
                            'grade' => ['A+', 'A', 'B', 'C', 'D'][rand(0, 4)],
                        ]
                    );
                }
            }
        }

        // ==================== FEE TYPES ====================
        $feeTypes = [
            [
                'name' => 'Tuition Fee',
                'amount' => 3500,
                'frequency' => 'monthly',
            ],
            [
                'name' => 'Assessment Fee',
                'amount' => 1500,
                'frequency' => 'yearly',
            ],
            [
                'name' => 'Library Fee',
                'amount' => 500,
                'frequency' => 'yearly',
            ],
            [
                'name' => 'Sports Fee',
                'amount' => 300,
                'frequency' => 'monthly',
            ],
            [
                'name' => 'Transport Fee',
                'amount' => 2000,
                'frequency' => 'monthly',
            ],
        ];

        foreach ($feeTypes as $ft) {
            FeeType::firstOrCreate(
                ['name' => $ft['name']],
                $ft
            );
        }

        // ==================== FEES ====================
        $tuitionFee = FeeType::where('name', 'Tuition Fee')->first();

        if ($tuitionFee) {
            $months = [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
            ];

            foreach ($students->take(40) as $student) {
                foreach ($months as $month) {
                    $isPaid = rand(0, 3) > 0;

                    $monthNumber = array_search($month, $months) + 1;

                    Fee::firstOrCreate(
                        [
                            'student_id' => $student->id,
                            'fee_type_id' => $tuitionFee->id,
                            'month' => $month,
                        ],
                        [
                            'amount' => 3500,
                            'discount' => 0,
                            'fine' => 0,
                            'paid_amount' => $isPaid ? 3500 : 0,
                            'status' => $isPaid ? 'paid' : 'pending',
                            'due_date' => '2026-' .
                                str_pad($monthNumber, 2, '0', STR_PAD_LEFT) .
                                '-10',
                            'paid_date' => $isPaid
                                ? '2026-' .
                                  str_pad($monthNumber, 2, '0', STR_PAD_LEFT) .
                                  '-08'
                                : null,
                            'receipt_number' => 'RCP-' . rand(10000, 99999),
                        ]
                    );
                }
            }
        }

        // ==================== BOOK CATEGORIES ====================
        $bookCats = [
            ['name' => 'Science & Technology'],
            ['name' => 'Mathematics'],
            ['name' => 'Literature & Fiction'],
            ['name' => 'History & Geography'],
            ['name' => 'Religion & Ethics'],
            ['name' => 'Reference Books'],
        ];

        foreach ($bookCats as $cat) {
            BookCategory::firstOrCreate(
                ['name' => $cat['name']]
            );
        }

        // ==================== BOOKS ====================
        $bookData = [
            [
                'title' => 'Mathematics for Junior Secondary',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0001',
            ],
            [
                'title' => 'Integrated Science',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0002',
            ],
            [
                'title' => 'English Grammar and Communication',
                'author' => 'Education Publishers',
                'isbn' => '978-0003',
            ],
            [
                'title' => 'Social Studies and Citizenship',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0004',
            ],
            [
                'title' => 'Kiswahili Language and Literature',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0005',
            ],
            [
                'title' => 'Agriculture and Environmental Studies',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0006',
            ],
            [
                'title' => 'Computer Studies',
                'author' => 'ICT Education Publishers',
                'isbn' => '978-0007',
            ],
            [
                'title' => 'Creative Arts and Design',
                'author' => 'Education Publishers',
                'isbn' => '978-0008',
            ],
            [
                'title' => 'Biology for Young Learners',
                'author' => 'Science Education Publishers',
                'isbn' => '978-0009',
            ],
            [
                'title' => 'Business Studies for Schools',
                'author' => 'Kenyan Curriculum Authors',
                'isbn' => '978-0010',
            ],
        ];

        $cat = BookCategory::first();

        if ($cat) {
            foreach ($bookData as $book) {
                Book::firstOrCreate(
                    ['isbn' => $book['isbn']],
                    array_merge(
                        $book,
                        [
                            'category_id' => $cat->id,
                            'publisher' => 'Kenyan Education Publishers',
                            'total_copies' => rand(5, 20),
                            'available_copies' => rand(3, 10),
                            'price' => rand(200, 800),
                            'rack_number' => 'R-' . rand(1, 10),
                        ]
                    )
                );
            }
        }

        // ==================== NOTICES ====================
        $notices = [
            [
                'title' => 'School Sports Day',
                'content' => 'The school will hold its annual sports day. Learners and parents are encouraged to support the school teams.',
                'audience' => 'all',
            ],
            [
                'title' => 'Assessment Timetable Released',
                'content' => 'The upcoming assessment timetable has been released. Learners should check the notice board for details.',
                'audience' => 'students',
            ],
            [
                'title' => 'Public Holiday Notice',
                'content' => 'The school will remain closed on the announced public holiday and resume classes on the next scheduled school day.',
                'audience' => 'all',
            ],
            [
                'title' => 'Parent Teacher Meeting',
                'content' => 'Parents and guardians are invited to attend the scheduled parent teacher meeting.',
                'audience' => 'parents',
            ],
            [
                'title' => 'Progress Reports',
                'content' => 'Learner progress reports will be made available through the school administration office and parent portal.',
                'audience' => 'students',
            ],
        ];

        foreach ($notices as $notice) {
            Notice::firstOrCreate(
                ['title' => $notice['title']],
                array_merge(
                    $notice,
                    [
                        'published_by' => 1,
                        'publish_date' => now()->toDateString(),
                        'status' => 'active',
                    ]
                )
            );
        }

        // ==================== EVENTS ====================
        $events = [
            [
                'title' => 'Annual Sports Day',
                'start_date' => '2026-09-12',
                'end_date' => '2026-09-12',
                'location' => 'School Sports Ground',
            ],
            [
                'title' => 'Science and Innovation Exhibition',
                'start_date' => '2026-09-25',
                'end_date' => '2026-09-26',
                'location' => 'School Hall',
            ],
            [
                'title' => 'Cultural Day',
                'start_date' => '2026-10-09',
                'end_date' => '2026-10-09',
                'location' => 'School Grounds',
            ],
            [
                'title' => 'Parent Teacher Meeting',
                'start_date' => '2026-10-17',
                'end_date' => '2026-10-17',
                'location' => 'Classrooms',
            ],
            [
                'title' => 'Annual Prize Giving Day',
                'start_date' => '2026-11-28',
                'end_date' => '2026-11-28',
                'location' => 'School Auditorium',
            ],
        ];

        foreach ($events as $event) {
            Event::firstOrCreate(
                ['title' => $event['title']],
                array_merge(
                    $event,
                    [
                        'description' =>
                            'Join us for ' .
                            $event['title'] .
                            ' at ' .
                            $event['location'],
                        'status' => 'active',
                    ]
                )
            );
        }

        // ==================== NEWS ====================
        $newsData = [
            [
                'title' => 'Learners Excel in Science and Innovation',
                'content' => 'Our learners demonstrated creativity and problem-solving skills during the school science and innovation activities.',
            ],
            [
                'title' => 'School Expands Digital Learning Resources',
                'content' => 'The school has continued to strengthen digital learning resources to support technology-enabled education.',
            ],
            [
                'title' => 'Learners Show Strong Progress',
                'content' => 'Learners have demonstrated encouraging progress across academic, practical, creative, and co-curricular activities.',
            ],
        ];

        foreach ($newsData as $news) {
            News::firstOrCreate(
                ['title' => $news['title']],
                array_merge(
                    $news,
                    [
                        'slug' => \Illuminate\Support\Str::slug($news['title']),
                        'author_id' => 1,
                        'status' => 'published',
                        'published_at' => now(),
                    ]
                )
            );
        }

        // ==================== TESTIMONIALS ====================
        $testimonials = [
            [
                'name' => 'Mr. Peter Kiptoo',
                'role' => 'Parent of a learner',
                'message' => 'The school provides a supportive learning environment and the teachers are committed to helping learners improve.',
            ],
            [
                'name' => 'Mrs. Jane Wanjiku',
                'role' => 'Parent of a learner',
                'message' => 'We appreciate the communication between the school and parents and the attention given to learner development.',
            ],
            [
                'name' => 'Mr. Samuel Ochieng',
                'role' => 'Parent of a learner',
                'message' => 'The learning environment is welcoming and the school encourages learners to develop both academic and practical skills.',
            ],
            [
                'name' => 'Mrs. Grace Chebet',
                'role' => 'Parent of a learner',
                'message' => 'The teachers are supportive and the school encourages learners to participate in different activities.',
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::firstOrCreate(
                ['name' => $t['name']],
                array_merge(
                    $t,
                    ['status' => 'active']
                )
            );
        }

        echo "Kenyan CBC demo data seeded successfully!\n";
        echo "Students: " . Student::count() . "\n";
        echo "Teachers: " . Teacher::count() . "\n";
        echo "Books: " . Book::count() . "\n";
        echo "Fees: " . Fee::count() . "\n";
    }
}
