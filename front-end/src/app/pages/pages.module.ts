import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HomeRoutingModule } from './home/home-routing.module';
import { LoginRoutingModule } from './login/login-routing.module';
import { FillProfileComponent } from './fill-profile/fill-profile.component';

@NgModule({
  declarations: [
    FillProfileComponent
  ],
  imports: [
    CommonModule,
    HomeRoutingModule,
    LoginRoutingModule
  ]
})
export class PagesModule { }
