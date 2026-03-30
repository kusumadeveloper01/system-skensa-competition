<x-dashboard-layout>
    <div class="flex flex-row items-center gap-2">
        <a href="{{ route('admin.student.index') }}" class="breadcrumbs-inactive">Student</a>
        <h1 class="breadcrumbs-inactive"><i class="ri-arrow-right-s-line"></i></h1>
        <h1 class="breadcrumbs-active">Show</h1>
    </div>

    <div class="box-dashboard">
        <div class="input-container">
            <div class="input-group lg:col-span-2">
                <x-label for="full_name">Full Name</x-label>
                <x-input id="full_name" type="text" :disabled="true" name="full_name" value="Student Full Name"></x-input>
            </div>

            <div class="input-group">
                <x-label for="nis">NIS</x-label>
                <x-input id="nis" type="text" :disabled="true" name="nis" value="123456789"></x-input>
            </div>

            <div class="input-group">
                <x-label for="email">Email</x-label>
                <x-input id="email" type="email" :disabled="true" name="email" value="student@example.com"></x-input>
            </div>

            <div class="input-group">
                <x-label for="phone_number">Phone Number</x-label>
                <x-input id="phone_number" type="text" :disabled="true" name="phone_number" value="081234567890"></x-input>
            </div>

            <div class="input-group">
                <x-label for="class">Class</x-label>
                <x-input id="class" type="text" :disabled="true" name="class" value="XII"></x-input>
            </div>

            <div class="input-group">
                <x-label for="major">Major</x-label>
                <x-input id="major" type="text" :disabled="true" name="major" value="RPL"></x-input>
            </div>

            <div class="input-group lg:col-span-2">
                <x-label for="teacher">Teacher</x-label>
                <x-input id="teacher" type="text" :disabled="true" name="teacher" value="Teacher Name"></x-input>
            </div>
        </div>

        <div>
            <a href="{{ route('admin.student.index') }}" class="button-secondary" type="button">Back</a>
        </div>
    </div>

    <div class="flex flex-row justify-between items-center mt-10">
        <h1 class="page-title">Competition Registrations</h1>
    </div>

    <div class="box-dashboard !mt-3">
        <div class="w-full overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th class="thead-cell rounded-tl-xl">#</th>
                        <th class="thead-cell">Code</th>
                        <th class="thead-cell">Competition</th>
                        <th class="thead-cell">Date</th>
                        <th class="thead-cell">Status</th>
                        <th class="thead-cell">Payment Status</th>
                        <th class="thead-cell rounded-tr-xl">Payment Proof</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-cell">1</td>
                        <td class="table-cell">REG-2026-0001</td>
                        <td class="table-cell">UI/UX Competition</td>
                        <td class="table-cell">21 Feb 2026</td>
                        <td class="table-cell">approved</td>
                        <td class="table-cell">paid</td>
                        <td class="table-cell">proof_0001.jpg</td>
                    </tr>
                    <tr>
                        <td class="table-cell">2</td>
                        <td class="table-cell">REG-2026-0002</td>
                        <td class="table-cell">Web Development Challenge</td>
                        <td class="table-cell">24 Feb 2026</td>
                        <td class="table-cell">pending</td>
                        <td class="table-cell">unpaid</td>
                        <td class="table-cell">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-dashboard-layout>
