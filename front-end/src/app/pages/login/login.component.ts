import { AfterContentChecked, AfterViewChecked, Component, OnInit, ViewChild, ViewEncapsulation } from '@angular/core';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {

  constructor() { }
 

  // @ViewChild('login') public typeLogin;
  // @ViewChild('register') public typeRegister;
  public type = 'login';
  ngOnInit(): void {
  }
  

  public registerForm(): void {
    this.type = 'register';
  }

  public singIn(): void {
    this.type = 'login';
  }

}
