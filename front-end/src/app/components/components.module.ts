import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainModule } from './layouts/main/main.module';
import { ExternalModule } from './layouts/external/external.module';
import { ErrorComponent } from './error/error.component';
import { MatDialogModule } from '@angular/material/dialog';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { AlertComponent } from './alert/alert.component';

@NgModule({
  declarations: [ErrorComponent, AlertComponent],
  imports: [
    CommonModule,
    MatDialogModule,
    MainModule,
    ExternalModule,
    MatButtonModule,
    MatIconModule,
  ],
  exports: [
    MainModule,
    ExternalModule,
    ErrorComponent,
    AlertComponent
  ]
})
export class ComponentsModule { }
