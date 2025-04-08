import { Component } from '@angular/core';
import {FormControl, FormGroup, ReactiveFormsModule, Validators} from '@angular/forms';
import {NgIf} from '@angular/common';
import {AuthService} from '../auth.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-login',
  imports: [
    NgIf,
    ReactiveFormsModule
  ],
  templateUrl: './login.component.html',
  standalone: true,
  styleUrl: './login.component.css'
})
export class LoginComponent {
  spinner: boolean = false

  loginForm: FormGroup = new FormGroup({
    phone: new FormControl('', {validators: Validators.required}),
    password: new FormControl('', {validators: Validators.required}),
  })

  constructor(
    private authService: AuthService,
    private router: Router
  ) { }

  login() {
    this.spinner = true
    this.authService.login(this.loginForm.value).subscribe({
      next: response => {
        this.authService.authenticate(response.body);
        this.spinner = false;
        this.router.navigate(['/home'])
      },
      error: err => {

      }
    })
  }
}
