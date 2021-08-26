import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Plan } from '@models/plan.model';
import { environment } from '@env/environment';

@Injectable({
  providedIn: 'root'
})
export class PaymentService {

  protected url = `${environment.apiUrl}payment`;
  constructor(protected http: HttpClient) { }

  public create(plan: Plan): Observable<any> {
    return this.http.post<any>(`${this.url}`, { plan_id: plan.id });
  }
}
