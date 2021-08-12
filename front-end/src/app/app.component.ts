import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})
export class AppComponent {
  title = 'front-end';

  constructor(private router: Router) {
  }
  private externalRoutes = [
    '/401',
    '/404',
  ];

  public isExternal(): boolean {
    for (const route of this.externalRoutes) {
      if (this.router.url.toString().indexOf(route) > -1) {
        console.log('false')
        return false;
      }
    }
    console.log('true')
    return true;
  }
}
