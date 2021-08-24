import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeRoutingModule } from './home/home-routing.module';
import { LoginRoutingModule } from './login/login-routing.module';
import { FillProfileComponent } from './fill-profile/fill-profile.component';
import { PlanComponent } from './plan/plan.component';

@NgModule({
  declarations: [
    FillProfileComponent,
    PlanComponent
  ],
  imports: [
    CommonModule,
    HomeRoutingModule,
    LoginRoutingModule
  ]
})
export class PagesModule { }
