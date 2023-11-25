<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar> 
    </x-slot> 


    <div class="w-full h-fit flex justify-between items-center flex-row ">
        <a href="/dashboard" class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Kembali</a>
        <button id="submit-button" form="settings-form" type="submit" class="text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" disabled>Simpan</button>
    </div>
    <form class="max-w-sm mx-auto" action="/dashboard/settings" method="POST" id="settings-form">
        @csrf
        @method('PUT')
        <input type="hidden" id="changed-field" name="changedFields" value="">
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username : </label>
            <input id="username-input" type="username" name="username"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required value="{{$user -> name}}">
                @error('username')
                <p class="text-input-sm md:text-input-lg" id="info">${{$message}}</p>
                @enderror
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                password</label>
            <input id="new-password" type="password" name="password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                >
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat
                password</label>
            <input id="confirm-password" type="password" name="password_confirmation"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                >
                @error('password')
                <p class="text-input-sm md:text-input-lg" id="info">{{$message}}</p>
                @enderror
                <p class="text-input-sm md:text-input-lg" id="info"></p>
        </div>
        <div class="mb-5">
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Whatsapp : </label>
            <input id="contact-wa-input" type="number" name="contact" 
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                value="{{!empty($whatsappContact) ? $whatsappContact -> phone_number : ''}}" type="number">
        </div>
        <div class="mb-5">
            <label for="partner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Partner Whatsapp : </label>
            <input id="partner-wa-input" type="number" name="partner" 
            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                value="{{!empty($whatsappPartner) ? $whatsappPartner -> phone_number : ''}}" type="number">
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                email</label>
            <input id="email-input" type="email" name="email"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="name@flowbite.com" value="{{$user -> email}}" required>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            var changedFields = []
            var defaultUsername = $('#username-input').val();
            var defaultContactNumber = $('#contact-wa-input').val();
            var defaultPartnerNumber = $('#partner-wa-input').val();
            var defaultEmail = $('#email-input').val();

            $('#username-input').change(function (e) { 
                e.preventDefault();
                const inputValue = $('#username-input').val();
                const isValidChange = (inputValue != defaultUsername) && (inputValue.length >= 5)
                const isEmpty = inputValue.length == 0
                if (isValidChange) {
                    if (!changedFields.includes('username') ) {
                        changedFields.push('username')
                        $('#changed-field').val(changedFields.toString());
                    }
                    $('#submit-button').attr('disabled', false);
                    $('#username-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                }else if (changedFields.includes("username")){
                    var index = changedFields.indexOf('username')
                    changedFields.splice(index,1)
                    $('#username-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', true);
                    $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                }else {
                    var index = changedFields.indexOf('username')
                    changedFields.splice(index,1)
                    $('#username-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', true);
                    $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                }

                if (inputValue == defaultUsername) {
                    var index = changedFields.indexOf('username')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', false);
                    $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                    $('#username-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                }

                if (isEmpty) {
                    $('#username-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                    var index = changedFields.indexOf('username')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            });

            $('#confirm-password').change(function (e) { 
            e.preventDefault();
            const inputValue = $(this).val()
            const isEmpty = inputValue.length == 0 && $('#new-password').val().length == 0
            const isPasswordValid = ((inputValue == $('#new-password').val()) && inputValue.length >= 8)
            if (isPasswordValid) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                $('#info').text('');
                if (!changedFields.includes('password')) {
                        changedFields.push('password')
                        $('#changed-field').val(changedFields.toString());
                    }
            }else{
                if (inputValue.length >= 1 && inputValue.length < 8) {
                    $('#info').text('panjang password minimum 8');
                }else {
                    $('#info').text('password harus sama');                    
                }
                
                if (changedFields.includes("password")){
                    var index = changedFields.indexOf('password')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
            }
            
            if (isEmpty) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (changedFields.includes("password")){
                    var index = changedFields.indexOf('password')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
        });
        // Password logic terbalik ketika invalid malah add value dan sebaliknya
        $('#new-password').change(function (e) { 
            e.preventDefault();
            const inputValue = $(this).val()
            const isEmpty = inputValue.length == 0 && $('#confirm-password').val().length == 0
            const isPasswordValid = ((inputValue == $('#confirm-password').val()) && inputValue.length >= 8)
            if (isPasswordValid) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                $('#info').text('');
                if (!changedFields.includes('password')) {
                        changedFields.push('password')
                        $('#changed-field').val(changedFields.toString());
                    }
            }else{
                if (inputValue.length >= 1 && inputValue.length < 8) {
                    $('#info').text('panjang password minimum 8');
                }else {
                    $('#info').text('password harus sama');                    
                }
                
                if (changedFields.includes("password")){
                    var index = changedFields.indexOf('password')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
            }
            
            if (isEmpty) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (changedFields.includes("password")){
                    var index = changedFields.indexOf('password')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
        });

        $('#contact-wa-input').change(function (e) { 
            e.preventDefault();

            const inputValue = $('#contact-wa-input').val();
            const isValid = (inputValue.length >= 8) && (inputValue.length <= 13)  && (inputValue.substring(0,2) == "08");
            if (isValid) {
                $('#contact-wa-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (!changedFields.includes('contact')) {
                        changedFields.push('contact')
                        $('#changed-field').val(changedFields.toString());
                    }
            }else {
                $('#contact-wa-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                if (changedFields.includes("contact")){
                    var index = changedFields.indexOf('contact')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
            
            if ($('#contact-wa-input').val().length == 0) {
                $('#contact-wa-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (changedFields.includes("contact")){
                    var index = changedFields.indexOf('contact')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
        });
        
        $('#partner-wa-input').change(function (e) { 
            e.preventDefault();
            const inputValue = $('#partner-wa-input').val();
            const isValid = (inputValue.length >= 8) && (inputValue.length <= 13)  && (inputValue.substring(0,2) == "08");
            if (isValid) {
                $('#partner-wa-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (!changedFields.includes('partner')) {
                        changedFields.push('partner')
                        $('#changed-field').val(changedFields.toString());
                    }
            }else {
                $('#partner-wa-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                if (changedFields.includes("partner")){
                    var index = changedFields.indexOf('partner')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
            
            if ($('#partner-wa-input').val().length == 0) {
                $('#partner-wa-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                if (changedFields.includes("partner")){
                    var index = changedFields.indexOf('partner')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                }
            }
        });

        $('#email-input').change(function (e) { 
            e.preventDefault();
            const inputValue = $('#email-input').val();
            const isValidChange = (inputValue != defaultEmail) && (inputValue.length >= 5)
            const isEmpty = inputValue.length == 0
            console.log(inputValue.length );
            console.log(isEmpty);
            console.log(isValidChange);
            if (isValidChange) {
                    if (!changedFields.includes('email')) {
                        changedFields.push('email')
                        $('#changed-field').val(changedFields.toString());
                        $('#submit-button').attr('disabled', false);
                        $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                        $('#email-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                    }
                }else if (changedFields.includes("email")){
                    $('#-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                    var index = changedFields.indexOf('email')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', true);
                    $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                    $('#email-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                }

                if (inputValue == defaultEmail) {
                    var index = changedFields.indexOf('email')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', false);
                    $('#submit-button').attr('class', "text-white h-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800");
                    $('#email-input').attr('class', "shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                }

                if (isEmpty) {
                    $('#email-input').attr('class', "shadow-sm bg-red-50 border border-red-300 text-red-900 text-input-sm md:text-input-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-[10px] px-[7px] dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light");
                    var index = changedFields.indexOf('email')
                    changedFields.splice(index,1)
                    $('#changed-field').val(changedFields.toString());
                    $('#submit-button').attr('disabled', true);
                    $('#submit-button').attr('class', "text-white h-fit bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[9px] py-[6px]  dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 cursor-not-allowed");
                }
        });
        });
    </script>
</x-app-layout >
