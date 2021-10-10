import { AfterViewInit } from '@angular/core';
import { ElementRef } from '@angular/core';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Product } from 'src/app/models/product.model';
import {HttpClientService} from '../../services/http-client.service';

@Component({
  selector: 'app-stock-data',
  templateUrl: './stock-data.component.html',
  styleUrls: ['./stock-data.component.css']
})
export class StockDataComponent implements AfterViewInit, OnInit {

  Products: Product[] = []; 
  products: any;

  constructor(private httpClientService: HttpClientService,
    private elementRef: ElementRef, private router: Router) { }

  ngOnInit() {
    // this.httpClientService.getProducts().subscribe(data => {
    //   this.Products = data;
    // })
    
    this.httpClientService.getJSONData().subscribe(res => {
      this.products = res.products;
    });  
  }

  ngAfterViewInit() {
    this.elementRef.nativeElement.ownerDocument.body.style.backgroundColor = 'black';
  }

  goToProductPage() {
    this.router.navigateByUrl('products');
  }

}
