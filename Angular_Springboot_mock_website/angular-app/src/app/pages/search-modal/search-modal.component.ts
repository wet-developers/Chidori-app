import { Inject } from '@angular/core';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { HttpClientService } from '../../services/http-client.service';
@Component({
  selector: 'app-search-modal',
  templateUrl: './search-modal.component.html',
  styleUrls: ['./search-modal.component.css']
})
export class SearchModalComponent implements OnInit {

  form: FormGroup;
  description: any;
  searchDescription: any;
  searchResults: any;
  products: any;
  searchIndication: boolean;
  
  constructor(
    private dialogRef: MatDialogRef<SearchModalComponent>, private http: HttpClientService) {
      this.form = new FormGroup (
        {}
      )
      this.description = "";
      this.searchDescription = "";
      this.searchIndication = false;
    }

  ngOnInit() {
    this.searchIndication = false;
    this.form = new FormGroup (
      {
        description: new FormControl('')
      }
    );
    this.http.getJSONData().subscribe(res => {
      this.products = res.products;
    });
  }

  search() {
    // this.dialogRef.close(this.form.value);
    console.log(this.products);
    let JSONKey = Object.keys(this.form.controls);
    for (let i=0; i < JSONKey.length; i++) {
      if (this.form.get(JSONKey[i])?.value !== '' &&
        this.form.get(JSONKey[i])?.value !== null) {
        this.searchResults = this.form.get(JSONKey[i])?.value;
        this.searchIndication = true; 
      } else {
        console.log('No proper search criteria');
      }
    }
    this.searchIndication = true; 
    console.log(this.searchResults);
    console.log(this.searchIndication);
  } 

  close() {
      this.dialogRef.close();
  }

}
