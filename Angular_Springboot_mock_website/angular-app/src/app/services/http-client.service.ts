import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { FormControl } from '@angular/forms';
import { Observable } from 'rxjs';
import { Product } from '../models/product.model';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json'})
};

@Injectable({
  providedIn: 'root'
})
export class HttpClientService {

  constructor(private httpClient: HttpClient) { }

  private productURL = 'http://localhost:8080/teamNoLackin-portal/users';

  public getProducts() {
    console.log('Test Call..');
    return this.httpClient.get<Product[]>(this.productURL);
  }

  public deleteUser(product: any) {
    return this.httpClient.delete(this.productURL + "/" + product.id);
  }

  public createUser(product: any) {
    return this.httpClient.post<Product>(this.productURL, product);
  }
  // getProductJSONData(value: Object[]) {
  //   console.log(this.httpClient.get('assets/contents/products.json'));
  //   console.log(value);
  //   //return this.httpClient.get('assets/contents/products.json').pipe(map(res => res.json()));
  // }
  // getJSON(value: Object[]): Observable<any> {
  //   return this.httpClient.get('../../assets/players.json').pipe((res: any) => res.json()
  //    )
  // }
  getJSONData(): Observable<any> {
    return this.httpClient.get('../../assets/contents/products.json');
  }
}


