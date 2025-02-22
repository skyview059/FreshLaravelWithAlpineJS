@extends('layouts.auth-layout')
@section('content')
    <div class="col-md-8 offset-xl-0 offset-md-2" x-data="login">
        <div class="brand-logo d-block d-xl-none">
            <img src="{{url('auth')}}/images/logo.png" alt="logo" class="img-fluid">
        </div>

        <div class="auth-form-wrap m-auto">
            <div class="auth-form-inner">
                <template x-if="errorAlert">
                <div class="alert alert-danger alert-dismissible fade show d-flex " role="alert">
                    <svg width="24" height="24" viewBox="0 0 140 141" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.11" y="0.00341797" width="140" height="140" rx="70" fill="#EA4335"/>
                        <rect opacity="0.21" x="16" y="16" width="108" height="108" rx="54" fill="#EA4335"/>
                        <path d="M70 108C49.0381 108 32 90.9619 32 70C32 49.0381 49.0381 32 70 32C90.9619 32 108 49.0381 108 70C108 90.9619 90.9619 108 70 108ZM70 37.3023C51.9721 37.3023 37.3023 51.9721 37.3023 70C37.3023 88.0279 51.9721 102.698 70 102.698C88.0279 102.698 102.698 88.0279 102.698 70C102.698 51.9721 88.0279 37.3023 70 37.3023Z" fill="#EA4335"/>
                        <path d="M70 76.186C68.5507 76.186 67.3488 74.9842 67.3488 73.5349V55.8605C67.3488 54.4112 68.5507 53.2093 70 53.2093C71.4493 53.2093 72.6512 54.4112 72.6512 55.8605V73.5349C72.6512 74.9842 71.4493 76.186 70 76.186Z" fill="#EA4335"/>
                        <path d="M70 87.674C69.5405 87.674 69.0809 87.568 68.6567 87.3912C68.2326 87.2145 67.8437 86.967 67.4902 86.6489C67.1721 86.2954 66.9247 85.9419 66.7479 85.4824C66.5712 85.0582 66.4651 84.5987 66.4651 84.1391C66.4651 83.6796 66.5712 83.2201 66.7479 82.7959C66.9247 82.3717 67.1721 81.9828 67.4902 81.6294C67.8437 81.3112 68.2326 81.0638 68.6567 80.887C69.5051 80.5335 70.4949 80.5335 71.3433 80.887C71.7674 81.0638 72.1563 81.3112 72.5098 81.6294C72.8279 81.9828 73.0753 82.3717 73.2521 82.7959C73.4288 83.2201 73.5349 83.6796 73.5349 84.1391C73.5349 84.5987 73.4288 85.0582 73.2521 85.4824C73.0753 85.9419 72.8279 86.2954 72.5098 86.6489C72.1563 86.967 71.7674 87.2145 71.3433 87.3912C70.9191 87.568 70.4595 87.674 70 87.674Z" fill="#EA4335"/>
                        </svg>
                    <p class="description text-danger ms-2" x-text="errMsg"></p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </template>
                <template x-if="successAlert">
                    <div class="alert alert-success fade show d-flex align-items-center" role="alert">
                        <svg width="24" height="24" viewBox="0 0 140 141" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.11" y="0.00341797" width="140" height="140" rx="70" fill="#34A853"/>
                            <rect opacity="0.21" x="16" y="16" width="108" height="108" rx="54" fill="#34A853"/>
                            <path d="M70 108C49.0381 108 32 90.9619 32 70C32 49.0381 49.0381 32 70 32C90.9619 32 108 49.0381 108 70C108 90.9619 90.9619 108 70 108ZM70 37.3023C51.9721 37.3023 37.3023 51.9721 37.3023 70C37.3023 88.0279 51.9721 102.698 70 102.698C88.0279 102.698 102.698 88.0279 102.698 70C102.698 51.9721 88.0279 37.3023 70 37.3023Z" fill="#34A853"/>
                            <path d="M65.0298 82.2581C64.3297 82.2581 63.6647 81.9707 63.1747 81.4679L53.2692 71.304C52.2542 70.2625 52.2542 68.5386 53.2692 67.4971C54.2843 66.4556 55.9643 66.4556 56.9794 67.4971L65.0298 75.7575L83.0206 57.2973C84.0357 56.2557 85.7157 56.2557 86.7308 57.2973C87.7458 58.3388 87.7458 60.0627 86.7308 61.1042L66.8849 81.4679C66.3948 81.9707 65.7298 82.2581 65.0298 82.2581Z" fill="#34A853"/>
                            </svg>

                        <p class="description ms-2 text-success">Logged in successfully!</p>
                      </div>
                </template>
                <div class="section-title pb-4">
                    <h3 class="title">Log in</h3>
                </div>
                <form class="row g-xl-3 g-2" @submit.prevent="loginProcess()">
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email <span>*</span></label>
                        <input type="text" x-model="formData.email" class="form-control" id="email">
                        <div class="form-text" x-text="error.email.length > 0 ? error.email : '' "></div>
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password <span>*</span></label>
                        <div class="position-relative">
                            <input x-model="formData.password" id="password-field" type="password" class="form-control" name="password" id="password" placeholder="">
                            <span toggle="#password-field" class="toggle-password position-absolute top-50 translate-middle-y end-0 d-flex cursor-pointer">
                            <svg class="eye-slash" width="18" height="15" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5205 4.66455C12.3321 4.36547 12.1307 4.0859 11.9228 3.82584C11.6824 3.52026 11.2276 3.49426 10.9548 3.76732L9.00568 5.71781C9.14862 6.14692 9.1746 6.64104 9.04467 7.15467C8.81727 8.0714 8.07662 8.81259 7.16055 9.04014C6.64729 9.17018 6.15352 9.14417 5.72473 9.00113C5.72473 9.00113 4.79566 9.93087 4.12648 10.6005C3.80163 10.9256 3.90558 11.4978 4.34088 11.6668C5.03605 11.9334 5.75721 12.0699 6.49786 12.0699C7.65432 12.0699 8.77829 11.7318 9.80481 11.1012C10.8508 10.451 11.7929 9.49526 12.553 8.27945C13.1702 7.29771 13.1377 5.64629 12.5205 4.66455Z" fill="#E3E3E3"/>
                                <path d="M7.80973 5.18616L5.18497 7.81282C4.85362 7.47474 4.63922 7.00662 4.63922 6.49949C4.63922 5.47874 5.47083 4.64003 6.49735 4.64003C7.00411 4.64003 7.47189 4.85458 7.80973 5.18616Z" fill="#E3E3E3"/>
                                <path d="M10.5575 2.43537L8.35507 4.63942C7.88079 4.1583 7.2246 3.87223 6.49694 3.87223C5.04163 3.87223 3.87218 5.04902 3.87218 6.49888C3.87218 7.22706 4.16454 7.88373 4.63882 8.35835L2.44285 10.5624H2.43635C1.71519 9.97725 1.05251 9.22956 0.487271 8.34534C-0.162424 7.32459 -0.162424 5.66667 0.487271 4.64592C1.24092 3.46262 2.16348 2.53289 3.19 1.89573C4.21652 1.27158 5.34049 0.92699 6.49694 0.92699C7.94576 0.92699 9.3491 1.46012 10.5575 2.43537Z" fill="#E3E3E3"/>
                                <path d="M8.35385 6.49787C8.35385 7.51862 7.52224 8.35733 6.49573 8.35733C6.45674 8.35733 6.42426 8.35733 6.38528 8.34433L8.34086 6.38734C8.35385 6.42635 8.35385 6.45886 8.35385 6.49787Z" fill="#E3E3E3"/>
                                <path d="M12.8437 0.146287C12.6488 -0.0487622 12.3305 -0.0487622 12.1356 0.146287L0.148719 12.1483C-0.0461892 12.3433 -0.0461892 12.6619 0.148719 12.857C0.246173 12.948 0.369615 13 0.499554 13C0.629493 13 0.752935 12.948 0.850389 12.8505L12.8437 0.848462C13.0452 0.653413 13.0452 0.341335 12.8437 0.146287Z" fill="#E3E3E3"/>
                            </svg>
                            <svg class="eye" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4 4.67484C13.552 1.70811 10.848 0 8 0C6.576 0 5.192 0.424985 3.928 1.21775C2.664 2.01868 1.528 3.18739 0.6 4.67484C-0.2 5.95797 -0.2 8.04203 0.6 9.32516C2.448 12.3001 5.152 14 8 14C9.424 14 10.808 13.575 12.072 12.7823C13.336 11.9813 14.472 10.8126 15.4 9.32516C16.2 8.0502 16.2 5.95797 15.4 4.67484ZM8 10.3059C6.208 10.3059 4.768 8.82662 4.768 7.00409C4.768 5.18155 6.208 3.70228 8 3.70228C9.792 3.70228 11.232 5.18155 11.232 7.00409C11.232 8.82662 9.792 10.3059 8 10.3059Z" fill="#E3E3E3"/>
                                <path d="M7.99875 4.66743C6.74275 4.66743 5.71875 5.71355 5.71875 7.00485C5.71875 8.28798 6.74275 9.3341 7.99875 9.3341C9.25475 9.3341 10.2868 8.28798 10.2868 7.00485C10.2868 5.72172 9.25475 4.66743 7.99875 4.66743Z" fill="#E3E3E3"/>
                            </svg>
                        </span>
                        </div>
                        <div class="form-text" x-text="error.password.length > 0 ? error.password : '' "></div>
                    </div>
                    <div class="col-12">
                        <a href="{{route('resetPassword')}}" class="form-label text-decoration-none">Forgot password? </a>
                    </div>

                    <div class="col-12">
                        <div class="google_recaptach clear">
                            <div class="g-recaptcha" data-callback="reCaptchaCallback()" data-sitekey="{{RECAPTCHA_ID}}"></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100 btn-loading">Log In</button>
                    </div>

                    <div class="col-12">
                        <div class="other-way-to-login-wrap">
                            <span class="other-way-to-login">Or</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn d-flex align-items-center justify-content-center border w-100 text-dark ff-body " href="{{ url('auth/google') }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18 9.2046C18 8.56642 17.9416 7.95278 17.833 7.36369H9.18367V10.8451H14.1262C13.9133 11.9701 13.2662 12.9232 12.2936 13.5614V15.8196H15.2616C16.9981 14.2528 18 11.9455 18 9.2046Z" fill="#4285F4"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.18368 18C11.6633 18 13.7421 17.1942 15.2616 15.8196L12.2936 13.5614C11.4712 14.1014 10.4193 14.4205 9.18368 14.4205C6.79175 14.4205 4.76717 12.8373 4.045 10.71H0.976813V13.0418C2.48795 15.9832 5.5937 18 9.18368 18Z" fill="#34A853"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.045 10.71C3.86132 10.17 3.75696 9.59323 3.75696 9.00005C3.75696 8.40687 3.86132 7.83005 4.04499 7.29005V4.95823H0.976809C0.354824 6.17323 0 7.54778 0 9.00005C0 10.4523 0.354828 11.8268 0.976813 13.0418L4.045 10.71Z" fill="#FBBC05"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.18368 3.57955C10.532 3.57955 11.7426 4.03364 12.6944 4.92546L15.3284 2.34409C13.738 0.891819 11.6591 0 9.18368 0C5.5937 0 2.48794 2.01687 0.976809 4.95823L4.04499 7.29005C4.76716 5.16278 6.79175 3.57955 9.18368 3.57955Z" fill="#EA4335"/>
                            </svg>
                            <span class="ms-2">Sign in with Google</span>
                        </a>
                    </div>
                    <div class="col-12">
                        <span class="already-account">Don’t have an account? <a href="{{url('signup')}}" class="btn-link ff-body fw-medium">Sign Up</a></span>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @push('js')
        <script>
            const login = {
                errMsg: '',
                errorAlert: false,
                successAlert: false,
                formData: {
                    email: '',
                    password: '',
                },
                error: {
                    email: '',
                    password: '',
                },
                loginProcess() {
                    let self = this;
                    let err = this.fromValidation();
                    if (!err) {
                        this.errorAlert = false;
                        this.successAlert = false;
                        let url = "{{route('login')}}";
                        this.formData['g-recaptcha-response'] = $('#g-recaptcha-response').val();
                        makeAjaxPost(this.formData, url, 'btn-loading').done(res => {
                            if (res.success) {
                                if (res.data.user_type === 'admin') {
                                    window.location.href = '{{route('adminDashboard')}}';
                                } else {
                                    window.location.href = '{{route('dashboard')}}';
                                }
                                self.errorAlert = false;
                                self.successAlert = true;
                            } else {
                                self.errMsg = res.msg;
                                self.errorAlert = true;
                                self.successAlert = false;

                            }
                        });
                    }
                },
                fromValidation() {
                    let err = false;
                    this.error.email = validation(this.formData.email, ['required', 'email']);
                    this.error.password = validation(this.formData.password, ['required', 'min|6', 'max|14']);
                    for (i in this.error) {
                        if (this.error[i].length > 0) {
                            err = true;
                        }
                    }
                    return err;
                }
            }
        </script>
    @endpush
@endsection
