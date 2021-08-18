import { AfterContentChecked, AfterViewChecked, Component, OnInit, ViewChild, ViewEncapsulation } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from '@services/user/user.service';
import { User } from '@models/users.model';
import { ErrorService } from '@services/error/error.service';
import { AuthService } from '@services/auth/auth.service';
import { ActivatedRoute } from '@angular/router';
import { AlertService } from '../../services/alert/alert.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  public registerForm: FormGroup;
  public loginForm: FormGroup;
  public forgotForm: FormGroup;
  public changePasswordForm: FormGroup;
  constructor(
    public fb: FormBuilder,
    private userService: UserService,
    private errorService: ErrorService,
    private authService: AuthService,
    private route: ActivatedRoute,
    private alertService: AlertService

  ) { }

  public type = 'login';
  ngOnInit(): void {

    this.registerForm = this.fb.group({
      name: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(8)]],
      password_confirmation: ['', [Validators.required, Validators.minLength(8)]]
    });

    this.loginForm = this.fb.group({
      email: ['', Validators.required],
      password: ['', Validators.required]
    });

    this.forgotForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
    });

    const queryParams = this.route.snapshot.queryParams;
    this.changePasswordForm = this.fb.group({
      email: [queryParams?.email || '', [Validators.required, Validators.email]],
      token: [queryParams?.token || '', [Validators.required]],
      password: ['', [Validators.required, Validators.minLength(8)]],
      password_confirmation: ['', [Validators.required, Validators.minLength(8)]]
    });
    if (queryParams?.email && queryParams.token) {

      this.setForm('changePassword');
    }
  }

  public setForm(form): void {
    this.type = form;
  }

  public submitForgot(): void {
    if (this.forgotForm.valid) {
      console.log(this.forgotForm.value);
      this.authService.forgotPassword(this.forgotForm.controls.email.value).subscribe({
        next: (res) => {
          this.alertService.show('confirmação', res.msg).afterClosed().subscribe(res => {
            this.setForm('login');
          });
        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente')
        }
      });
    }
  }
  public submitLogin(): void {
    if (this.loginForm.valid) {
      const email = this.loginForm.controls.email.value
      const password = this.loginForm.controls.password.value
      this.authService.authUser(email, password).subscribe({
        next: (res) => {
          console.log('res', res);
        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente')
        }
      });

    }
  }

  public submitRegister(): void {

    if (this.registerForm.valid) {
      this.userService.register(this.registerForm.value).subscribe({
        next: (res) => {
          console.log('res', res);
        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente')
        }
      });
    }
    console.log(this.registerForm.value);
  }

  public submitChangePassword(): void {

    if (this.changePasswordForm.valid) {
      this.authService.resetPassword(this.changePasswordForm.value).subscribe({
        next: (res) => {
          console.log('res', res);

        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente')
        }
      });
    }
    console.log(this.changePasswordForm.value);
  }

}
