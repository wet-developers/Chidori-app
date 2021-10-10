import { Component, Inject, OnInit } from '@angular/core';
import { ThemePalette } from '@angular/material/core';
import {MatDialog, MatDialogConfig, MAT_DIALOG_DATA} from '@angular/material/dialog';
import { SearchModalComponent } from '../search-modal/search-modal.component';
import { HttpClientService } from '../../services/http-client.service';
import { OwlOptions } from 'ngx-owl-carousel-o';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  customOptions: any = {
    loop: true,
    margin: 10,
    autoplay:true,
    responsiveClass: true,
    navText: ['Previous', 'Next'],
    responsive: {
      0: {
       items: 1
     },
      480: {
       items: 2
     },
      940: {
       items: 3
     }
    },
   nav: true
  };
  img: any;
  featuredCollectionsRow1: any;
  featuredCollectionsRow2: any;

  constructor(public dialog: MatDialog, private Http: HttpClientService) { }

  ngOnInit() {
    this.img = '../../assets/TeamNoLackin.png';
    
    this.Http.getJSONData().subscribe(res => {
      this.featuredCollectionsRow1 = res.featuredCollectionsRow1;
      this.featuredCollectionsRow2 = res.featuredCollectionsRow2;
    });
  }
  background: ThemePalette = 'primary';


  openSearchModal() {
    let dialogConfig = new MatDialogConfig();

    dialogConfig.disableClose = true;
    dialogConfig.autoFocus = true;
    dialogConfig = { height: "700px", width: "900px" };

    this.dialog.open(SearchModalComponent, dialogConfig);
  }
  
  // mouseEntered() {
  //   this.destroyInterval();
  // }
  
  // mouseLeave() {
  //   this.startInterval();
  // }
}
