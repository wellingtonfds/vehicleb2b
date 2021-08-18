import { Injectable } from '@angular/core';
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor
} from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class TokenInterceptor implements HttpInterceptor {

  constructor() {}

  intercept(request: HttpRequest<unknown>, next: HttpHandler): Observable<HttpEvent<unknown>> {

    const token = sessionStorage.getItem('vehicle_b2b_0');
    if (token) {
      const tokenJson = JSON.parse(token);
      const cloned = request.clone({
        headers: request.headers.set('Authorization',
          'Bearer ' + tokenJson.access_token),
      });
      return next.handle(cloned);
    }
    return next.handle(request);
  }
}
