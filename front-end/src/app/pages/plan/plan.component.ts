import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { User } from '@models/users.model';
import { PlanService } from '@services/plan/plan.service';
import { filter } from 'rxjs/operators';
import { FilterQuery } from '@models/filter-query.model';
import { Plan } from '../../models/plan.model';
import { Paginate } from '@models/paginate.model';
import { PaymentService } from '@services/payment/payment.service';

@Component({
  selector: 'app-plan',
  templateUrl: './plan.component.html',
  styleUrls: ['./plan.component.scss']
})
export class PlanComponent implements OnInit {

  public user: User;
  public filter: FilterQuery[] = [];
  public plans: Plan[];
  public paginateItems: Paginate<Plan>;
  constructor(
    private route: ActivatedRoute,
    private planService: PlanService,
    private paymentService: PaymentService
  ) { }

  ngOnInit(): void {
    this.route.data.subscribe(info => {
      this.user = info.user;
      console.log('user', this.user);
      this.filter.push({
        filter: 'type',
        value: this.user.type
      });
      this.getPage(0, 10, this.filter);
    });
  }

  public getPage(page: number = 0, perPage: number = 10, filter: FilterQuery[] = this.filter): void {
    this.planService.list(page, perPage, filter).subscribe(paginate => {
      this.paginateItems = paginate;
      console.log(paginate)
    });
  }
  public createPayment(plan: Plan): void {
    this.paymentService.create(plan).subscribe({
      next: (res) => console.log('res', res)
    });
  }
}
