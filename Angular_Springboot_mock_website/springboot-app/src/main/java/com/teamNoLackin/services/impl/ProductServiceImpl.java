package com.teamNoLackin.services.impl;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import java.util.*;
import com.teamNoLackin.POJOS.Product;
import com.teamNoLackin.repositories.ProductRegistry;
import com.teamNoLackin.services.ProductService;

@Service
public class ProductServiceImpl implements ProductService {
	
	@Autowired
	private ProductRegistry repository;
	
	@Override
	public Product create (Product product) {
		return repository.save(product);	
	}
	
	@Override
	public Product delete(int id) {
		Product product = findById(id);
		if (product != null) {
			repository.delete(product);
		}
		return product;
	}
	
	@Override
	public List findAll() {
		return repository.findAll();
	}
	
	@Override
	public Product findById(int id) {
		return repository.findOne(id);
	}
	
	@Override
	public Product update(Product product) {
		return null;
	}
	
	
	
	
	
	
	
}