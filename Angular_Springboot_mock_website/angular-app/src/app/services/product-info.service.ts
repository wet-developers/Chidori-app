import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
@Injectable({
  providedIn: 'root'
})
export class ProductInfoService {

  parsedDescription: any;
  productDescription:any;
  product: any;

  constructor() { }
  
  productInfoStorage(product: any) {
    JSON.stringify(product);
    this.productDescription = JSON.stringify(product);
    this.parsedDescription = JSON.parse(this.productDescription);
  }

  getProductInfo(): any {
    return this.parsedDescription;
  }
}
