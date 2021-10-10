package com.teamNoLackin.repositories;

import org.springframework.data.mongodb.repository.MongoRepository;
import org.springframework.data.repository.Repository;
import org.springframework.data.rest.core.annotation.RepositoryRestResource;

import java.util.List;
import com.teamNoLackin.POJOS.Product;

public interface ProductRegistry extends Repository {
	
	Product create(Product product);
	
	void delete(Product product);
	
	List findAll();
	
	Product findOne(int id);
	
	Product save(Product product);
	

}
