import { Component } from '@angular/core';
import { Router, ActivatedRoute, ParamMap } from '@angular/router'; 

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'stock-market-app-dev';

  constructor (private route: Router) {

  }

  getStockData() {
    this.route.navigateByUrl('stock-data');

  }
}
