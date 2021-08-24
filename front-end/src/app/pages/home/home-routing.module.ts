import { NgModule } from '@angular/core';

import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home.component';
import { UserResolver } from '@resolvers/user/user.resolver';

const routes: Routes = [
  { path: '', component: HomeComponent, resolve: { user: UserResolver } },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HomeRoutingModule { }
