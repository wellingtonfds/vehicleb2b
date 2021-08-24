import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { User } from '@models/users.model';
import { CrudService } from '@services/crud-service.abstract';
import { Observable } from 'rxjs';
import { environment } from '@env/environment';

@Injectable({
  providedIn: 'root'
})
export class UserService extends CrudService<User> {

  constructor(public http: HttpClient) {
    super(http, 'users');
  }

  public register(user: User): Observable<User> {
    return this.http.post<User>(`${environment.apiUrl}register`, user);
  }
  public user(): Observable<User> {
    return this.http.get<User>(`${environment.apiUrl}user`);
  }
  public setType(type: 'lojista' | 'consultor'): Observable<User> {
    return this.http.put<User>(`${environment.apiUrl}user/type`, { type });
  }
}
