<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create sample teacher
        $teacher1 = Teacher::create([
            'full_name' => 'Bu Putri',
            'nip' => '198501012010011001',
            'email' => 'buputri@gmail.com',
            'password' => Hash::make('buputri123'),
        ]);
        
        $teacher2 = Teacher::create([
            'full_name' => 'Bu Assri',
            'nip' => '199002152015012001',
            'email' => 'buassri@gmail.com',
            'password' => Hash::make('buassri123'),
        ]);
        
        // Create sample students for teacher 1
        Student::create([
            'teacher_id' => $teacher1->id,
            'full_name' => 'elmanuk',
            'nis' => '31400',
            'email' => 'elmanuk@gmail.com',
            'password' => Hash::make('elmanuk123'),
            'phone_number' => '081234567890',
            'class' => 'XII',
            'major' => 'RPL',
        ]);
        
        // Create sample students for teacher 2
        Student::create([
            'teacher_id' => $teacher2->id,
            'full_name' => 'yandex',
            'nis' => '31469',
            'email' => 'yandex@gmail.com',
            'password' => Hash::make('yandex123'),
            'phone_number' => '081234567891',
            'class' => 'XII',
            'major' => 'TKR',
        ]);
    }
}
