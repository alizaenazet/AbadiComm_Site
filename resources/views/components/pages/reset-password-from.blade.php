<x-app-layout 
gap="12px" title="admin login">
    <x-slot:navbar> {{-- not using navbar  --}} </x-slot> 
<form method="POST" action="/reset-password">
    @csrf
    <input type="hidden" name="token" value={{$token}} ">
    <input type="hidden" name="email" value={{$email}} ">
    <div class="mb-6">
      <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your new password</label>
      <input type="password" name="password" id="new-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      @error('password')
      <p class="text-input-sm md:text-input-lg" id="info">{{$message}}</p>
      @enderror
    </div>
    <div class="mb-6">
      <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your confirm password</label>
      <input type="password" name="passwordConfirmation" id="confirm-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      <p class="text-input-sm md:text-input-lg" id="info"></p>
    </div>
    <button type="submit" id="submit-button" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed " disabled>Submit</button>
  </form>
  @if ($errors->any())
      @foreach ($errors->all() as $error)
            <p class="text-input-sm md:text-input-lg" id="info">{{$error}}</p>
      @endforeach
  @endif

  <script>
    $(document).ready(function () {
        $('#confirm-password').change(function (e) { 
            e.preventDefault();
            var isPasswordNull = ($('#new-password').val().length < 8) || ($('#confirm-password').val().length < 8)
            if ($('#new-password').val() == $('#confirm-password').val() && (!isPasswordNull)) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ");
                $('#info').text('');
            }else{
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed");
                $('#info').text('password harus sama');
            }
            
            if (isPasswordNull) {
                $('#info').text('panjang password minimum 8');
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed");
            }
        });
        $('#new-password').change(function (e) { 
            e.preventDefault();
            var isPasswordNull = ($('#new-password').val().length < 8) || ($('#confirm-password').val().length < 8)
            if ($('#new-password').val() == $('#confirm-password').val() && (!isPasswordNull)) {
                $('#submit-button').attr('disabled', false);
                $('#submit-button').attr('class', "text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ");
                $('#info').text('');
            }else{
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed");
                $('#info').text('password harus sama');
            }
            
            if (isPasswordNull) {
                $('#info').text('panjang password minimum 8');
                $('#submit-button').attr('disabled', true);
                $('#submit-button').attr('class', "text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[20px] py-[10px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-not-allowed");
            }
        });
    });
  </script>
</x-app-layout >
  