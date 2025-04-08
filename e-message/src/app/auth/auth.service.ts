import { Injectable } from '@angular/core';
import {HttpClient, HttpResponse} from '@angular/common/http';
import {environment} from '../../environments/environment';
import {map} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(
    private http: HttpClient
  ) { }

  login(data: {phone: string, password: string}) {
    return this.http.post(environment.apiUrl + '/login', data, {
      observe: 'response'
    }).pipe(
      map((response: HttpResponse<any>) => response)
    )
  }

  authenticate(body: any) {
    if (typeof window !== 'undefined') {
      localStorage.setItem('access_token', body.access_token)
    }
  }

  isAuthenticated() {
    if (typeof window !== 'undefined') {
      return !!localStorage.getItem('access_token');
    }

    return false;
  }
}
