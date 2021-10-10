import { ElementRef } from '@angular/core';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { FormControl } from '@angular/forms';
import { FormGroup } from '@angular/forms';

@Component({
  selector: 'app-contact-page',
  templateUrl: './contact-page.component.html',
  styleUrls: ['./contact-page.component.css']
})
export class ContactPageComponent implements AfterViewInit, OnInit {

  form: FormGroup;
  constructor(private elementRef: ElementRef) {
    this.form = new FormGroup (
      {}
    )
   }

  ngAfterViewInit() {
    this.elementRef.nativeElement.ownerDocument.body.style.backgroundColor = 'black';
  }
  
  ngOnInit() {
    this.form = new FormGroup (
      {
        name: new FormControl(''),
        email: new FormControl(''),
        number: new FormControl(''),
        message: new FormControl('')
      }
    );
  }

  contactFormRequest() {
    console.log(this.form.value);

  }


}
