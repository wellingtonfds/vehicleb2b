import { Injectable } from '@angular/core';
import { CrudService } from '@services/crud-service.abstract';
import { Plan } from '@models/plan.model';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class PlanService extends CrudService<Plan> {
  constructor(public http: HttpClient) {
    super(http, 'plan');
  }
}
