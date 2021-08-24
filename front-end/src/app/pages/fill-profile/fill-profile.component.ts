import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { UserService } from '@services/user/user.service';
import { ErrorService } from '@services/error/error.service';

@Component({
  selector: 'app-fill-profile',
  templateUrl: './fill-profile.component.html',
  styleUrls: ['./fill-profile.component.scss']
})
export class FillProfileComponent implements OnInit {

  constructor(
    private route: ActivatedRoute,
    private userService: UserService,
    private errorService: ErrorService,
  ) { }

  ngOnInit(): void {

    this.route.data.subscribe(info => {
      console.log('user', info);
    });
  }

  public chooseConsult(): void {
    this.userService.setType('consultor').subscribe(
      {
        next: (res) => {
          console.log(res);
        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente');
        }
      }
    );

  }

  public chooseShopkeeper(): void {
    this.userService.setType('lojista').subscribe(
      {
        next: (res) => {
          console.log(res);
        },
        error: (error) => {
          this.errorService.traitError(error.error?.error?.message || error.error?.errors || 'Error no servidor tente novamente');
        }
      }
    );
  }

}
