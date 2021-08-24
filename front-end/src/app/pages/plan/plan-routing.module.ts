import { NgModule } from '@angular/core';

import { RouterModule, Routes } from '@angular/router';
import { UserResolver } from '@resolvers/user/user.resolver';
import { PlanComponent } from './plan.component';


const routes: Routes = [
  { path: '', component: PlanComponent, resolve: { user: UserResolver } },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
exports: [RouterModule]
})
export class PlanRoutingModule { }
