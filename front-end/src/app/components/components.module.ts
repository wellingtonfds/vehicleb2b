import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainModule } from './layouts/main/main.module';
import { ExternalModule } from './layouts/external/external.module';



@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    MainModule,
    ExternalModule
  ],
  exports: [
    MainModule,
    ExternalModule
  ]
})
export class ComponentsModule { }
