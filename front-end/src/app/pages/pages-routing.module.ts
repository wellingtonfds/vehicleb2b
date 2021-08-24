import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';


const routes: Routes = [
  { path: 'login', loadChildren: () => import('@pages/login/login.module').then(m => m.LoginModule) },
  { path: 'home', loadChildren: () => import('@pages/home/home.module').then(m => m.HomeModule) },
  { path: 'home/novo/plano', loadChildren: () => import('@pages/plan/plan.module').then(m => m.PlanModule) },
  { path: 'home/novo', loadChildren: () => import('@pages/fill-profile/fill-profile.module').then(m => m.FillProfileModule) },
];
@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})

export class PagesRoutingModule { }
