import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { ComponentsModule } from '@components/components.module';
import { RouterModule } from '@angular/router';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { TokenInterceptor } from './interceptors/token/token.interceptor';


@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
  BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    RouterModule,
    ComponentsModule,
    BrowserAnimationsModule,
    MatButtonModule,
    MatIconModule,
  ],
  exports: [
    MatButtonModule,
    MatIconModule
  ],
  providers: [
    { provide: HTTP_INTERCEPTORS, useClass: TokenInterceptor, multi: true },
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
