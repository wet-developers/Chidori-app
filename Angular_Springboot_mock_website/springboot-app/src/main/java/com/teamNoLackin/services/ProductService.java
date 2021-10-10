package com.teamNoLackin.services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.data.mongodb.repository.MongoRepository;

import java.util.List;
import com.teamNoLackin.POJOS.Product;
import com.teamNoLackin.repositories.ProductRegistry;


public interface ProductService {
	
	Product create(Product product);
	
	Product delete(int id);
	
	List findAll();
	
	Product findById(int id);
	
	Product update(Product product);

}