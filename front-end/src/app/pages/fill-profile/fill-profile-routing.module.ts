import { NgModule } from '@angular/core';

import { RouterModule, Routes } from '@angular/router';
import { FillProfileComponent } from './fill-profile.component';
import { UserResolver } from '@resolvers/user/user.resolver';


const routes: Routes = [
  { path: '', component: FillProfileComponent, resolve: { user: UserResolver } },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class FillProfileRoutingModule { }
