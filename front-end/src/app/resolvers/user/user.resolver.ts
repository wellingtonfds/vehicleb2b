import { Injectable } from '@angular/core';
import {
  Router, Resolve,
  RouterStateSnapshot,
  ActivatedRouteSnapshot
} from '@angular/router';
import { Observable, of } from 'rxjs';
import { UserService } from '@services/user/user.service';
import { User } from '@models/users.model';

@Injectable({
  providedIn: 'root'
})
export class UserResolver implements Resolve<boolean> {

  constructor(private userService: UserService) { }
  resolve(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): Observable<User> | any {
    return this.userService.user();
  }
}
