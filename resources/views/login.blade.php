<x-app-layout>

<div class="container mt-5 " style="min-height: 100vh;">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 ">
            <div class="card shadow" style="border-radius: 15px;">
                <div class="card-header text-center" style="background-color: #000; color: #28a745; border-top-left-radius: 15px; border-top-right-radius: 15px;">
                    <h4>ورود</h4>
                </div>
                <div class="card-body" style="background-color: #222; border-radius: 0 0 15px 15px;">
                    <form action="login_action.php" method="post" >
                        <div class="mb-3">
                            <label for="username" class="form-label text-light">نام کاربری</label>
                            <input type="text"name="username" class="form-control" id="username" placeholder="نام کاربری" >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label text-light">رمز عبور</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="رمز عبور" >
                        </div>
                        <button type="submit" class="btn btn-success">ورود</button>
                            
                    </form>
                                            <p style="color:#28a745;">اگر ثبت نام نکرده اید <a href="sign">کلیک</a> کنید</p>

                </div>
            </div>
        </div>
    </div>
</div>



</x-app-layout>
