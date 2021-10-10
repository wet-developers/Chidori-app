import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor(private routing: Router) { }

  ngOnInit(): void {
  }
  
  goCollections() {
    this.routing.navigate(['/collections']);
  }
}
