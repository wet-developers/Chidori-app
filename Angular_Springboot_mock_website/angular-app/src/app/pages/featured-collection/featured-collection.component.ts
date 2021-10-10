import { Component, OnInit } from '@angular/core';
import { HttpClientService } from 'src/app/services/http-client.service';
import { ProductInfoService } from 'src/app/services/product-info.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-featured-collection',
  templateUrl: './featured-collection.component.html',
  styleUrls: ['./featured-collection.component.css']
})
export class FeaturedCollectionComponent implements OnInit {
  
  featuredCollectionsRow1: any;
  featuredCollectionsRow2: any;
  filteredFeaturedProduct: Object[] = [];
  
  constructor(private Http: HttpClientService, private productDetails: ProductInfoService,
    private route: Router) { }

  ngOnInit() {
    this.Http.getJSONData().subscribe(res => {
      this.featuredCollectionsRow1 = res.featuredCollectionsRow1;
      this.featuredCollectionsRow2 = res.featuredCollectionsRow2;
    });
  }

  searchForProductRow1(event: any) {
    Object.entries(this.featuredCollectionsRow1);
    for (let i=0; i < this.featuredCollectionsRow1.length; i++) {
      let value = Object.values(this.featuredCollectionsRow1[i]);
      for (let y=0; y < value.length; y++) {
        if(event.srcElement.tagName === "IMG") {
          if (value[y] === event.target.attributes.src.value) {
            let filteredValue = String(value[y]).split(".");
            this.filteredFeaturedProduct.push(filteredValue[0].substring(7));
            this.productDetails.productInfoStorage(this.filteredFeaturedProduct);    
          }
        } else if (event.srcElement.tagName === "H2") {
          if (value[y] === event.target.innerHTML) {
            let filteredValue = String(value[y]).split(".");
            this.filteredFeaturedProduct.push(filteredValue[0].substring(7));
            this.filteredFeaturedProduct.push(String(value[y]));
            this.productDetails.productInfoStorage(this.filteredFeaturedProduct); 
          }
        }
      }
    }
    this.route.navigateByUrl('products');

  }

  searchForProductRow2(event: any) {
    Object.entries(this.featuredCollectionsRow2);
    for (let i=0; i < this.featuredCollectionsRow2.length; i++) {
      let value = Object.values(this.featuredCollectionsRow2[i]);
      for (let y=0; y < value.length; y++) {
        if(event.srcElement.tagName === "IMG") {
          if (value[y] === event.target.attributes.src.value) {
            let filteredValue = String(value[y]).split(".");
            this.filteredFeaturedProduct.push(filteredValue[0].substring(7));            this.filteredFeaturedProduct.push(String(value[y]));
            this.productDetails.productInfoStorage(this.filteredFeaturedProduct);    
          }
        } else if (event.srcElement.tagName === "H2") {
          if (value[y] === event.target.innerHTML) {
            let filteredValue = String(value[y]).split(".");
            this.filteredFeaturedProduct.push(filteredValue[0].substring(7));            this.filteredFeaturedProduct.push(String(value[y]));
            this.productDetails.productInfoStorage(this.filteredFeaturedProduct); 
          }
        }
      }
    }
    this.route.navigateByUrl('products');

  }

}
