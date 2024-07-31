import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable, Type } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  localUrl = 'http://localhost/api/';

  constructor(public httpClient: HttpClient) {}

  getAssetsPath(path: string): string {
    return this.localUrl.replace('api/', '') + path;
  }

  headerGenerator() {
    var httpOptions = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
      }),
    };

    return httpOptions;
  }

  get<Type>(path: string): Observable<Type> {
    return this.httpClient.get<Type>(
      this.localUrl + path,
      this.headerGenerator()
    );
  }

  post<Type>(path: string, object: Type): Observable<Type> {
    return this.httpClient.post<Type>(
      this.localUrl + path,
      object,
      this.headerGenerator()
    );
  }

  put<Type>(path: string, object: Type): Observable<Type> {
    return this.httpClient.put<Type>(
      this.localUrl + path,
      object,
      this.headerGenerator()
    );
  }

  delete<Type>(path: string): Observable<Type> {
    return this.httpClient.delete<Type>(
      this.localUrl + path,
      this.headerGenerator()
    );
  }
}
