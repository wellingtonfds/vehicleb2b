import { AfterContentChecked, AfterViewChecked, Component, OnInit, ViewChild, ViewEncapsulation } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { UserService } from '@services/user/user.service';
import { User } from '@models/users.model';
import { ErrorService } from '@services/error/error.service';
import { AuthService } from '@services/auth/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  public registerForm: FormGroup;
  public loginForm: FormGroup;
  constructor(
    public fb: FormBuilder,
    private userService: UserService,
    private errorService: ErrorService,
    private authService: AuthService

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
  }

  public toggleForm(): void {
    this.type = this.type === 'login' ? 'register' : 'login';
  }

  public submitLogin():void {
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



      })
    
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



      })
    }
    console.log(this.registerForm.value);
  }

}
