package com.teamNoLackin.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.teamNoLackin.POJOS.Product;
import com.teamNoLackin.repositories.ProductRegistry;
import com.teamNoLackin.services.*;
import com.teamNoLackin.services.impl.*;

@CrossOrigin(origins = "http://localhost:4200", maxAge = 3600)
@RestController
@RequestMapping({"/api"})
public class stockDataController {
	
	@Autowired
	private ProductService productService;
	
	@PostMapping
	public Product create(@RequestBody Product product) {
		return productService.create(product);
	}
	
	@GetMapping(path = {"/{id}"})
	public Product findOne(@PathVariable("id") int id) {
	    return productService.findById(id);
	}
	
	@PutMapping
	public Product update(@RequestBody Product product) {
		return productService.update(product);
	}
	
	@DeleteMapping(path = {"/{id}"})
	public Product delete(@PathVariable("id") int id) {
		return productService.delete(id);
	}
	
	@GetMapping
	public List findAll() {
		return productService.findAll();
	}
}
