import { Routes } from '@angular/router';
import {HomeComponent} from './home/home.component';
import {AuthGuard} from './auth/auth.guard';
import {LoginComponent} from './auth/login/login.component';
import {GuestGuard} from './auth/guest.guard';

export const routes: Routes = [
  { path: 'login', component: LoginComponent, canActivate: [GuestGuard]},
  { path: '', redirectTo: '/login', pathMatch: 'full'},
  {
    path: 'home',
    component: HomeComponent,
    canActivate: [AuthGuard]
  },
];
