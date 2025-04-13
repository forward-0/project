<x-app-layout>


<div class="container mt-5 " style="min-height: 100vh;">
    <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-8  ">
        <div class="card mt-4 shadow" style="border-radius: 15px;">
                <div class="card-header text-center" style="background-color: #000; color: #28a745; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h4>ثبت نام</h4>
                </div>
                <div class="card-body" style="background-color: #222; border-radius: 0 0 15px 15px;">
                    <form action="{{ route('sign.register') }}"method="post" class="mt-2">
                        @csrf
                    <div class="mb-3">
                            <label for="newUsername" class="form-label text-light">نام و نام خانوادگی </label>
                            <input type="text" class="form-control"name="realname" id="newUsername" placeholder="نام و نام خانوادگی" required>
                        </div>
                        <div class="mb-3">
                            <label for="newUsername" class="form-label text-light">نام کاربری</label>
                            <input type="text" class="form-control"name="username" id="newUsername" placeholder="نام کارری" required>
                        </div>
                        <div class="mb-3">
                            <label for="newUsername" class="form-label text-light">ایمیل  </label>
                            <input type="email" class="form-control"name="email" id="newUsername" placeholder="ایمیل " required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label text-light">رمز عبور</label>
                            <input type="password" class="form-control"name="password" id="newPassword" placeholder="رمز عبور" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">ثبت نام</button>
                        <p style="color:#28a745;">اگر ثبت نام کرده اید <a href="login">کلیک</a> کنید</p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
