import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FillProfileComponent } from './fill-profile.component';
import { FillProfileRoutingModule } from './fill-profile-routing.module';
import { MatCardModule } from '@angular/material/card';
import { MatExpansionModule } from '@angular/material/expansion';
import { MatButtonModule } from '@angular/material/button';

@NgModule({
  declarations: [FillProfileComponent],
  imports: [
  CommonModule,
    FillProfileRoutingModule,
    MatCardModule,
    MatExpansionModule,
    MatButtonModule
  ]
})
export class FillProfileModule { }
