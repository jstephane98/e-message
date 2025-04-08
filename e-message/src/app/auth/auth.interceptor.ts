import { HttpInterceptorFn } from '@angular/common/http';

export const authInterceptor: HttpInterceptorFn = (req, next) => {
  if (typeof window !== 'undefined') {
    const token = localStorage.getItem('access_token');

    if (token) {
      const headers: any = {
        Authorization: `Bearer ${token}`,
      };

      const clonedReq = req.clone({
        setHeaders: headers
      });

      return next(clonedReq);
    } else {
      return next(req);
    }
  }

  return next(req);
};
