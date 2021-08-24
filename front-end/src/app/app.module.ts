import { BrowserModule } from '@angular/platform-browser';
import { DEFAULT_CURRENCY_CODE, NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { ComponentsModule } from '@components/components.module';
import { RouterModule } from '@angular/router';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { TokenInterceptor } from './interceptors/token/token.interceptor';
import { FacebookLoginProvider, GoogleLoginProvider, SocialAuthServiceConfig, SocialLoginModule } from 'angularx-social-login';
import { environment as env } from '@env/environment';



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
    SocialLoginModule
  ],
  exports: [
    MatButtonModule,
    MatIconModule
  ],
  providers: [
    { provide: HTTP_INTERCEPTORS, useClass: TokenInterceptor, multi: true },
    {
      provide: 'SocialAuthServiceConfig',
      useValue: {
        autoLogin: false,
        providers: [
          {
            id: GoogleLoginProvider.PROVIDER_ID,
            provider: new GoogleLoginProvider(env.googleId)
          },
          {
            id: FacebookLoginProvider.PROVIDER_ID,
            provider: new FacebookLoginProvider(env.facebookId)
          }
        ]
      } as SocialAuthServiceConfig,
    },
    {provide: DEFAULT_CURRENCY_CODE, useValue: 'BRL'}
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
