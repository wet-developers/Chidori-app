import { AfterViewInit, Component, ElementRef, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { HttpClientService } from 'src/app/services/http-client.service';
import { ProductInfoService } from 'src/app/services/product-info.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements AfterViewInit, OnInit {

  individualProducts: any;
  form: FormGroup;
  description: any;
  productDescription: any;
  filteredProduct: any;
  searchResults: any;
  searchIndication: boolean;


  constructor(private elementRef: ElementRef, private httpClientService: HttpClientService,
    private productInfo: ProductInfoService) { 
    this.form = new FormGroup (
      {}
    )
    this.description = "";
    this.productDescription = "";
    this.searchIndication = false;
  }

  ngOnInit() {
    this.searchIndication = false;
    this.form = new FormGroup (
      {
        description: new FormControl('')
      }
    );
    
    this.httpClientService.getJSONData().subscribe(res => {
      this.individualProducts = res.individualProducts;
        Object.entries(this.individualProducts);
        for (let i=0; i < this.individualProducts.length; i++) {
          console.log(this.individualProducts[i]);
          let value = Object.values(this.individualProducts[i]);
          for (let y=0; y < value.length; y++) {
            console.log('Product contents: ' + value[y]);
            console.log('Featured Product contents: ' + this.productDescription);
            if(String(value[y]) === String(this.productDescription)) {
              const filteredData = Object.entries(this.individualProducts[i]);
              for (let z=0; z < filteredData.length; z++) {
                
                console.log('Filtered data to be shown ' + String(filteredData[z]).split(","));
              }
            } else {
              console.log('No Matching Products');
            }
          }
        }
    });

    this.productDescription = this.productInfo.getProductInfo();
    console.log('Filtered Featured Product Info: ' + this.productDescription);
  }

  ngAfterViewInit() {
    this.elementRef.nativeElement.ownerDocument.body.style.backgroundColor = 'black';
  }

}
